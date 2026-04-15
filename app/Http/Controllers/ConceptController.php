<?php

namespace App\Http\Controllers;

class ConceptController extends Controller
{
    public function index()
    {
        // Vrais avis Google uniquement
        $googleBusinessController = new GoogleBusinessController;
        $aggregateData = $googleBusinessController->getAggregateRating();
        $averageRating = $aggregateData['rating'] ?? 4.5;
        $totalReviews = $aggregateData['total'] ?? 6460;

        $allReviews = $googleBusinessController->getReviews();
        $featuredReviews = collect($allReviews)
            ->filter(fn (array $r): bool => ($r['rating'] ?? 0) >= 4 && ! empty($r['content']))
            ->take(3)
            ->map(fn (array $r): object => (object) $r)
            ->values();

        $seo = [
            'title' => 'Notre Concept – Factory & Co Aéroville',
            'description' => 'Le concept Factory & Co Aéroville : authenticité et savoir-faire depuis 1989. Burgers Halal, bagels façon Brooklyn, cheesecakes maison. CC Westfield Aéroville, Tremblay-en-France.',
            'keywords' => 'concept restaurant aéroville, burger authentique tremblay-en-france, diner américain aéroville, factory co concept, restaurant artisanal aéroville',
            'canonical' => route('concept'),
        ];

        return view('pages.concept', compact('seo', 'featuredReviews', 'averageRating', 'totalReviews'));
    }
}
