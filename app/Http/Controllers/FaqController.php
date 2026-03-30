<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = FaqItem::grouped();

        $seo = [
            'title' => 'FAQ – Questions Fréquentes | Factory & Co Aéroville',
            'description' => 'Toutes les réponses à vos questions sur Factory & Co Aéroville : horaires, accès, options Halal, allergènes, Click & Collect.',
            'keywords' => 'faq factory and co tremblay-en-france, halal aéroville, allergènes restaurant tremblay-en-france, horaires factory co aéroville, roissy, aéroville',
            'canonical' => route('faq'),
        ];

        return view('pages.faq', compact('faqs', 'seo'));
    }
}
