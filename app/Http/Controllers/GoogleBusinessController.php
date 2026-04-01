<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GoogleBusinessController extends Controller
{
    /**
     * Place ID Factory & Co Aéroville (CID: 13984384105414976292)
     */
    private const PLACE_ID = 'ChIJGyTYsqMV5kcRT6rVHsNxon4';

    /**
     * Fetch real reviews from Google Places API.
     * Returns up to 10 unique reviews (newest + most relevant).
     */
    public function getReviews(): array
    {
        $apiKey = config('app.google_places_api_key');

        if (! $apiKey) {
            Log::warning('Google Places API key non configurée.');

            return [];
        }

        return Cache::remember('google_real_reviews', 3600, function () use ($apiKey) {
            $allReviews = [];

            // Fetch newest reviews
            $newest = $this->fetchReviewsFromPlaces($apiKey, 'newest');
            foreach ($newest as $review) {
                $allReviews[$review['author_name'].'_'.md5($review['content'])] = $review;
            }

            // Fetch most relevant reviews for more diversity
            $relevant = $this->fetchReviewsFromPlaces($apiKey, 'most_relevant');
            foreach ($relevant as $review) {
                $allReviews[$review['author_name'].'_'.md5($review['content'])] = $review;
            }

            return array_values($allReviews);
        });
    }

    /**
     * Get aggregate rating from Google Places API.
     */
    public function getAggregateRating(): array
    {
        $apiKey = config('app.google_places_api_key');

        if (! $apiKey) {
            return ['rating' => null, 'total' => null];
        }

        return Cache::remember('google_aggregate_rating', 3600, function () use ($apiKey) {
            try {
                $response = Http::get('https://maps.googleapis.com/maps/api/place/details/json', [
                    'place_id' => self::PLACE_ID,
                    'fields' => 'rating,user_ratings_total',
                    'key' => $apiKey,
                ]);

                $data = $response->json();

                if ($response->successful() && isset($data['result'])) {
                    return [
                        'rating' => $data['result']['rating'] ?? null,
                        'total' => $data['result']['user_ratings_total'] ?? null,
                    ];
                }
            } catch (\Exception $e) {
                Log::error('Google Places API Error: '.$e->getMessage());
            }

            return ['rating' => null, 'total' => null];
        });
    }

    /**
     * Fetch reviews from Google Places API Details endpoint.
     */
    private function fetchReviewsFromPlaces(string $apiKey, string $sort = 'newest'): array
    {
        try {
            $response = Http::get('https://maps.googleapis.com/maps/api/place/details/json', [
                'place_id' => self::PLACE_ID,
                'fields' => 'reviews',
                'reviews_sort' => $sort,
                'language' => 'fr',
                'key' => $apiKey,
            ]);

            $data = $response->json();

            if (! $response->successful() || ! isset($data['result']['reviews'])) {
                return [];
            }

            $reviews = [];

            foreach ($data['result']['reviews'] as $review) {
                if (empty($review['text'])) {
                    continue;
                }

                $authorName = $review['author_name'] ?? 'Anonyme';

                $reviews[] = [
                    'author_name' => $authorName,
                    'author_initial' => mb_strtoupper(mb_substr($authorName, 0, 1)),
                    'rating' => $review['rating'] ?? 5,
                    'content' => $review['text'],
                    'source' => 'google',
                    'date_label' => $review['relative_time_description'] ?? '',
                ];
            }

            return $reviews;
        } catch (\Exception $e) {
            Log::error('Google Places API: erreur récupération avis', [
                'error' => $e->getMessage(),
            ]);

            return [];
        }
    }
}
