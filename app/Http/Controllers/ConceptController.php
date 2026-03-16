<?php

namespace App\Http\Controllers;

class ConceptController extends Controller
{
    public function index()
    {
        $seo = [
            'title' => 'Notre Concept – Factory & Co Val d\'Europe',
            'description' => 'Découvrez l\'univers de Factory & Co : une philosophie basée sur l\'authenticité, la passion et le savoir-faire artisanal.',
            'keywords' => 'concept factory and co, restaurant authentique, diner américain, burgers artisanaux',
            'canonical' => route('concept'),
        ];

        return view('pages.concept', compact('seo'));
    }
}
