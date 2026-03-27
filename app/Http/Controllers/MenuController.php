<?php

namespace App\Http\Controllers;

use App\Models\Product;

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
            'title' => 'La Carte | Factory & Co Val d\'Europe',
            'description' => 'Découvrez la carte complète de Factory & Co à Val d\'Europe. Smash Burgers anglais, Bagels New-Yorkais, Cheesecake premium, Bowls sains. Tous les ingrédients frais et délicieux.',
            'keywords' => 'carte factory co serris, menu factory co val d\'europe, burger bagel cheesecake serris',
            'canonical' => route('menu.index'),
            'h1' => 'La Carte – Factory & Co',
        ];

        return view('pages.menu.carte', compact('seo', 'burgers', 'bagels', 'cheesecakes', 'bowls'));
    }

    /**
     * Page Silo 1 — L'Atelier Burger
     */
    public function burgers()
    {
        $products = Product::available()
            ->category('burgers')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $seo = [
            'title' => 'Burgers Smash à Val d\'Europe | Factory & Co',
            'description' => 'Découvrez L\'Atelier Burger de Factory & Co à Val d\'Europe à Serris. Smash Burgers au bœuf français, options Halal certifiées, menus enfants. 14 Rue du Danube.',
            'keywords' => 'burger val d\'europe serris, smash burger serris, burger halal serris, meilleur burger val d\'europe, factory and co burger',
            'canonical' => route('menu.burgers'),
            'h1' => 'L\'Atelier Burger – Smash Burgers à Val d\'Europe',
        ];

        return view('pages.menu.burgers', compact('products', 'seo'));
    }

    /**
     * Page Silo 2 — Bagels New-Yorkais
     */
    public function bagels()
    {
        $products = Product::available()
            ->category('bagels')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $seo = [
            'title' => 'Bagels Breakfast à Val d\'Europe | Factory & Co',
            'description' => 'Bagels frais new-yorkais à Val d\'Europe à Serris. Chauds, froids, à composer. Petit-déjeuner américain dès 8h30 au cœur du centre commercial Val d\'Europe.',
            'keywords' => 'bagel val d\'europe serris, petit déjeuner américain serris, bagel frais serris, breakfast val d\'europe, factory and co bagel',
            'canonical' => route('menu.bagels'),
            'h1' => 'Bagels New-Yorkais – Breakfast dès 8h30 à Val d\'Europe',
        ];

        return view('pages.menu.bagels', compact('products', 'seo'));
    }

    /**
     * Page Silo 3 — Cheesecake Factory
     */
    public function cheesecake()
    {
        $products = Product::available()
            ->category('cheesecake')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $seo = [
            'title' => 'Cheesecake Premium à Val d\'Europe | Factory & Co',
            'description' => 'Le meilleur cheesecake de Val d\'Europe à Serris. Recettes du chef Jonathan Jablonski : New-Yorkais classique, Oreo, Kinder Bueno, Spéculoos. À emporter en coffret.',
            'keywords' => 'cheesecake val d\'europe serris, meilleur cheesecake serris, cheesecake serris, pâtisserie américaine serris, factory and co cheesecake',
            'canonical' => route('menu.cheesecake'),
            'h1' => 'Cheesecake Factory – Pâtisseries New-Yorkaises à Val d\'Europe',
        ];

        return view('pages.menu.cheesecake', compact('products', 'seo'));
    }

    /**
     * Page Silo 4 — Healthy & Bowls
     */
    public function bowls()
    {
        $products = Product::available()
            ->category('bowls')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $seo = [
            'title' => 'Bowls & Salades Saines – Vegan, Végétarien | Factory & Co Val d\'Europe',
            'description' => 'Super Bowls et salades saines à Val d\'Europe à Serris. Options vegan et végétarien, ingrédients frais et biologiques. Manger sain et équilibré au centre commercial.',
            'keywords' => 'bowl sain val d\'europe serris, salade healthy serris, vegan val d\'europe, manger sain serris, factory and co bowl',
            'canonical' => route('menu.bowls'),
            'h1' => 'Healthy & Bowls – Manger Sain à Val d\'Europe',
        ];

        return view('pages.menu.bowls', compact('products', 'seo'));
    }
}
