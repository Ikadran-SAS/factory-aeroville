<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = FaqItem::grouped();

        $seo = [
            'title'       => 'FAQ – Questions Fréquentes | Factory & Co Val d\'Europe',
            'description' => 'Toutes les réponses à vos questions sur Factory & Co Val d\'Europe : horaires, accès, options Halal, allergènes, Click & Collect.',
            'keywords'    => 'faq factory and co serris, halal val d\'europe, allergènes restaurant serris, horaires factory co val d\'europe',
            'canonical'   => route('faq'),
        ];

        return view('pages.faq', compact('faqs', 'seo'));
    }
}
