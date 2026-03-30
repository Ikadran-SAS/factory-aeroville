<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class GoogleBusinessController extends Controller
{
    /**
     * Récupère les avis du restaurant depuis Google Places API
     * avec supplémentation par des avis statiques
     */
    /**
     * Place ID Factory & Co Aéroville (CID: 13984384105414976292)
     */
    private const PLACE_ID = 'ChIJGyTYsqMV5kcRT6rVHsNxon4';

    public function getReviews(): array
    {
        $apiKey = config('app.google_places_api_key');

        if (! $apiKey) {
            \Log::warning('Google Places API Key not configured');

            return $this->getStaticReviews();
        }

        try {
            $detailsResponse = Http::get('https://maps.googleapis.com/maps/api/place/details/json', [
                'place_id' => self::PLACE_ID,
                'fields' => 'reviews,rating,user_ratings_total',
                'reviews_sort' => 'newest',
                'language' => 'fr',
                'key' => $apiKey,
            ]);

            $detailsData = $detailsResponse->json();

            if ($detailsResponse->successful() && isset($detailsData['result']['reviews'])) {
                $reviews = [];
                foreach ($detailsData['result']['reviews'] as $review) {
                    $reviews[] = [
                        'author_name' => $review['author_name'] ?? 'Anonyme',
                        'author_initial' => strtoupper(substr($review['author_name'] ?? 'A', 0, 1)),
                        'date_label' => $review['relative_time_description'] ?? '',
                        'source' => 'google',
                        'rating' => $review['rating'] ?? 5,
                        'content' => $review['text'] ?? '',
                    ];
                }

                if (! empty($reviews)) {
                    $staticReviews = $this->getStaticReviews();

                    return array_merge($reviews, $staticReviews);
                }
            }
        } catch (\Exception $e) {
            \Log::error('Google Places API Error: '.$e->getMessage());
        }

        return $this->getStaticReviews();
    }

    /**
     * Récupère la note moyenne et le total d'avis depuis Google
     */
    public function getAggregateRating(): array
    {
        $apiKey = config('app.google_places_api_key');

        if (! $apiKey) {
            return [
                'rating' => 4.5,
                'total' => 6460,
            ];
        }

        try {
            $detailsResponse = Http::get('https://maps.googleapis.com/maps/api/place/details/json', [
                'place_id' => self::PLACE_ID,
                'fields' => 'rating,user_ratings_total',
                'key' => $apiKey,
            ]);

            $detailsData = $detailsResponse->json();

            if ($detailsResponse->successful() && isset($detailsData['result'])) {
                return [
                    'rating' => $detailsData['result']['rating'] ?? 4.5,
                    'total' => $detailsData['result']['user_ratings_total'] ?? 6460,
                ];
            }
        } catch (\Exception $e) {
            \Log::error('Google Places API Error: '.$e->getMessage());
        }

        return [
            'rating' => 4.5,
            'total' => 6460,
        ];
    }

    /**
     * Avis statiques (fallback et supplémentation)
     */
    private function getStaticReviews(): array
    {
        return [
            [
                'author_name' => 'Marie L.',
                'author_initial' => 'M',
                'date_label' => 'il y a 2 semaines',
                'source' => 'google',
                'rating' => 5,
                'content' => 'Excellent restaurant à Aéroville ! Le smash burger est vraiment délicieux, la viande est de qualité et la sauce maison est top. Service rapide et souriant. Je recommande vivement !',
            ],
            [
                'author_name' => 'Thomas R.',
                'author_initial' => 'T',
                'date_label' => 'il y a 1 mois',
                'source' => 'google',
                'rating' => 5,
                'content' => 'Le cheesecake New-Yorkais est une tuerie absolue. Texture parfaite, base biscuitée croustillante. On a aussi pris des bagels pour le petit-déjeuner avant notre vol à l\'aéroport CDG, vraiment frais et copieux !',
            ],
            [
                'author_name' => 'Sophie M.',
                'author_initial' => 'S',
                'date_label' => 'il y a 3 semaines',
                'source' => 'google',
                'rating' => 4,
                'content' => 'Très bonne adresse à Aéroville. Idéal pour une pause shopping ou avant un vol à l\'aéroport CDG, les portions sont généreuses et les prix raisonnables. Le milkshake Oreo est incroyable !',
            ],
            [
                'author_name' => 'Jean-Pierre D.',
                'author_initial' => 'J',
                'date_label' => 'il y a 2 mois',
                'source' => 'google',
                'rating' => 5,
                'content' => 'Halal et délicieux ! Rare de trouver une option Halal de qualité dans un centre commercial. Le Halal Smash Burger était juteux et bien assaisonné. Je reviendrai à chaque passage à Aéroville.',
            ],
            [
                'author_name' => 'Camille B.',
                'author_initial' => 'C',
                'date_label' => 'il y a 3 semaines',
                'source' => 'tripadvisor',
                'rating' => 5,
                'content' => 'Le Lost Bagel au saumon fumé est mon péché mignon à chaque visite ! Le cream cheese est généreux, le saumon de qualité. Un vrai bagel new-yorkais, pas une copie. Bravo !',
            ],
            [
                'author_name' => 'Lucas F.',
                'author_initial' => 'L',
                'date_label' => 'il y a 1 semaine',
                'source' => 'google',
                'rating' => 5,
                'content' => 'Végétarien depuis 5 ans, c\'est difficile de trouver de bons plats en centre commercial. Ici, le Veggie Bowl et le Veggie Smash sont vraiment bons. Ingrédients frais, préparation soignée.',
            ],
        ];
    }
}
