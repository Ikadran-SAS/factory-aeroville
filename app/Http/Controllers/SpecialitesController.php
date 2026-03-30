<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;

class SpecialitesController extends Controller
{
    public function index()
    {
        // Get only specialties-related FAQs
        $faqs = FaqItem::where('category', 'specialites')
            ->orderBy('sort_order')
            ->get()
            ->toArray();

        $seo = [
            'title' => 'Nos Spécialités – Factory & Co Aéroville',
            'description' => 'Smash Burgers, Bagels New-Yorkais, Cheesecake & Breakfast. Découvrez les 4 spécialités premium qui font notre réputation.',
            'keywords' => 'smash burger, bagels, cheesecake, breakfast factory and co, specialites restaurant tremblay-en-france, roissy, aéroville',
            'canonical' => route('specialites'),
        ];

        return view('pages.specialites', compact('seo', 'faqs'));
    }
}
