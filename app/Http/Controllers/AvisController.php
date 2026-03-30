<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;

class AvisController extends Controller
{
    public function index()
    {
        $faqsGrouped = FaqItem::grouped();
        // Flatten grouped FAQs into a single array for the accordion component
        $faqs = collect($faqsGrouped)->flatten(1)->values()->all();

        // Avis et note depuis Google Places API (live)
        $googleBusinessController = new GoogleBusinessController;
        $aggregateData = $googleBusinessController->getAggregateRating();
        $averageRating = $aggregateData['rating'] ?? 4.5;
        $totalReviews = $aggregateData['total'] ?? 6460;

        $allReviews = $googleBusinessController->getReviews();
        $reviews = collect($allReviews)
            ->filter(fn (array $r): bool => ! empty($r['content']))
            ->map(fn (array $r): object => (object) $r)
            ->values();

        $seo = [
            'title' => 'Avis Clients | Factory & Co – Nos Clients Témoignent',
            'description' => 'Découvrez les avis vérifiés de nos clients satisfaits. '.number_format($averageRating, 1, ',', '').'★ - '.$totalReviews.' avis. Factory & Co Aéroville à Tremblay-en-France.',
            'keywords' => 'avis clients factory co, témoignages factory co, avis burgers tremblay-en-france, reviews factory and co, avis restaurants aéroville, roissy, aéroville',
            'canonical' => route('avis'),
        ];

        return view('pages.avis', compact('seo', 'faqs', 'reviews', 'averageRating', 'totalReviews'));
    }
}
