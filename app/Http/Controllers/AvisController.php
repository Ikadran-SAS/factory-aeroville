<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;
use App\Models\Review;

class AvisController extends Controller
{
    public function index()
    {
        $faqsGrouped = FaqItem::grouped();
        $faqs = collect($faqsGrouped)->flatten(1)->values()->all();

        $reviews = Review::where('is_visible', true)
            ->orderBy('sort_order')
            ->get();

        $googleReviewsController = new GoogleReviewsController;
        $aggregateData = $googleReviewsController->getAggregateRating();
        $averageRating = $aggregateData['rating'] ?? ($reviews->count() > 0 ? $reviews->avg('rating') : 0);
        $totalReviews = $aggregateData['total'] ?? $reviews->count();

        $seo = [
            'title' => 'Avis Clients | Factory & Co – Nos Clients Témoignent',
            'description' => 'Découvrez les avis vérifiés de nos clients satisfaits. '.number_format($averageRating, 1, ',', '').'★ - '.$totalReviews.' avis. Factory & Co Aéroville à Tremblay-en-France.',
            'keywords' => 'avis clients factory co, témoignages factory co, avis burgers tremblay-en-france, reviews factory and co, avis restaurants aéroville, roissy, aéroville',
            'canonical' => route('avis'),
        ];

        return view('pages.avis', compact('seo', 'faqs', 'reviews', 'averageRating', 'totalReviews'));
    }
}
