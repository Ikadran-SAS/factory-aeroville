<?php

namespace App\Http\Controllers;

use App\Models\Review;

class ConceptController extends Controller
{
    public function index()
    {
        $featuredReviews = Review::featured()
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        $googleReviewsController = new GoogleReviewsController;
        $aggregateData = $googleReviewsController->getAggregateRating();
        $averageRating = $aggregateData['rating'] ?? ($featuredReviews->count() > 0 ? $featuredReviews->avg('rating') : 0);
        $totalReviews = $aggregateData['total'] ?? Review::where('is_visible', true)->count();

        $seo = [
            'title' => 'Notre Concept – Factory & Co Aéroville',
            'description' => 'Le concept Factory & Co Aéroville : authenticité et savoir-faire depuis 1989. Burgers Halal, bagels façon Brooklyn, cheesecakes maison. CC Westfield Aéroville, Tremblay-en-France.',
            'keywords' => 'concept restaurant aéroville, burger authentique tremblay-en-france, diner américain aéroville, factory co concept, restaurant artisanal aéroville',
            'canonical' => route('concept'),
        ];

        return view('pages.concept', compact('seo', 'featuredReviews', 'averageRating', 'totalReviews'));
    }
}
