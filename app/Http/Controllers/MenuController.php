<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;

class MenuController extends Controller
{
    /**
     * Page Landing — La Carte
     */
    public function index()
    {
        $burgers = Product::available()
            ->category('burgers')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $bagels = Product::available()
            ->category('bagels')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $cheesecakes = Product::available()
            ->category('cheesecake')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $bowls = Product::available()
            ->category('bowls')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $seo = [
            'title' => 'La Carte | Factory & Co Aéroville',
            'description' => 'Découvrez la carte complète de Factory & Co à Aéroville. Smash Burgers anglais, Bagels New-Yorkais, Cheesecake premium, Bowls sains. Tous les ingrédients frais et délicieux.',
            'keywords' => 'carte factory co tremblay-en-france, menu factory co aéroville, burger bagel cheesecake tremblay-en-france, roissy, aéroville',
            'canonical' => route('menu.index'),
            'h1' => 'La Carte – Factory & Co',
        ];

        $featuredReviews = Review::featured()
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        return view('pages.menu.carte', compact('seo', 'burgers', 'bagels', 'cheesecakes', 'bowls', 'featuredReviews'));
    }
}
