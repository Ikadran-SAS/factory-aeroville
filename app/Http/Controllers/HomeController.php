<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;
use App\Models\OpeningHour;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Page d'accueil — Hub de marque SEO
     */
    public function index()
    {
        $featuredProducts = Product::available()
            ->featured()
            ->ordered()
            ->get()
            ->groupBy('category');

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

        $openingHours = OpeningHour::orderBy('sort_order')->get();

        $faqsGrouped = FaqItem::grouped();
        $faqs = collect($faqsGrouped)->flatten(1)->values()->all();

        $seo = [
            'title' => 'Factory & Co Aéroville – Restaurant Burger Tremblay-en-France',
            'description' => 'Factory & Co, restaurant burger, bagel et cheesecake à Aéroville à Tremblay-en-France. Centre commercial ouvert 7j/7. Smash Burgers, Bagels New-Yorkais, Cheesecake Factory.',
            'keywords' => 'restaurant burger aéroville, factory and co tremblay-en-france, manger aéroville tremblay-en-france, smash burger tremblay-en-france, cheesecake tremblay-en-france, bagel aéroville, roissy, aéroville',
            'canonical' => route('home'),
        ];

        return view('pages.home', compact('featuredProducts', 'featuredReviews', 'openingHours', 'faqs', 'seo', 'averageRating', 'totalReviews'));
    }
}
