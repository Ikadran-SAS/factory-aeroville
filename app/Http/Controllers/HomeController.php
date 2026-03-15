<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;
use App\Models\OpeningHour;
use App\Models\Product;
use App\Models\Review;

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

        $featuredReviews = Review::featured()
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        $openingHours = OpeningHour::orderBy('sort_order')->get();

        $faqs = FaqItem::grouped();

        $seo = [
            'title' => 'Factory & Co Val d\'Europe – Restaurant Burger Serris',
            'description' => 'Factory & Co, restaurant burger, bagel et cheesecake à Val d\'Europe à Serris. Centre commercial ouvert 7j/7. Smash Burgers, Bagels New-Yorkais, Cheesecake Factory.',
            'keywords' => 'restaurant burger val d\'europe, factory and co serris, manger val d\'europe serris, smash burger serris, cheesecake serris, bagel val d\'europe',
            'canonical' => route('home'),
        ];

        return view('pages.home', compact('featuredProducts', 'featuredReviews', 'openingHours', 'faqs', 'seo'));
    }

    /**
     * Page Click & Collect
     */
    public function clickCollect()
    {
        $seo = [
            'title' => 'Click & Collect – Commandez en avance | Factory & Co Val d\'Europe',
            'description' => 'Commandez votre repas en ligne et récupérez-le sans attendre à Val d\'Europe à Serris. Click & Collect disponible 7j/7.',
            'keywords' => 'click collect restaurant val d\'europe, commander en ligne factory co serris, commande à emporter serris',
            'canonical' => route('click-collect'),
        ];

        $popularProducts = Product::available()
            ->featured()
            ->ordered()
            ->take(6)
            ->get();

        return view('pages.click-collect', compact('seo', 'popularProducts'));
    }
}
