<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = BlogPost::published()->orderBy('updated_at', 'desc')->get();

        $content = view('sitemap', compact('posts'))->render();

        return Response::make($content, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    public function html()
    {
        $routes = [
            ['url' => route('home'), 'title' => 'Accueil', 'priority' => '1.0', 'description' => 'Page d\'accueil'],
            ['url' => route('menu.index'), 'title' => 'La carte', 'priority' => '0.9', 'description' => 'Découvrez notre menu complet'],
            ['url' => route('concept'), 'title' => 'Notre concept', 'priority' => '0.8', 'description' => 'En savoir plus sur Factory & Co'],
            ['url' => route('specialites'), 'title' => 'Nos spécialités', 'priority' => '0.7', 'description' => 'Nos 4 spécialités qui font notre réputation'],
            ['url' => route('avis'), 'title' => 'Avis clients', 'priority' => '0.7', 'description' => 'Voir les avis de nos clients'],
            ['url' => route('faq'), 'title' => 'FAQ', 'priority' => '0.7', 'description' => 'Questions fréquentes et allergènes'],
            ['url' => route('click-collect'), 'title' => 'Click & Collect', 'priority' => '0.6', 'description' => 'Commandez en ligne'],
            ['url' => route('contact'), 'title' => 'Contact', 'priority' => '0.5', 'description' => 'Nous contacter'],
            ['url' => route('mentions-legales'), 'title' => 'Mentions légales', 'priority' => '0.3', 'description' => 'Informations légales et éditoriales'],
            ['url' => route('confidentialite'), 'title' => 'Politique de confidentialité', 'priority' => '0.3', 'description' => 'Politique de protection des données'],
            ['url' => route('conditions-utilisation'), 'title' => 'Conditions d\'utilisation', 'priority' => '0.3', 'description' => 'Conditions régissant l\'utilisation du site'],
        ];

        return view('pages.sitemap-html', compact('routes'));
    }

    public function robots()
    {
        $content = "User-agent: *\nAllow: /\nSitemap: ".route('sitemap');

        return Response::make($content, 200, [
            'Content-Type' => 'text/plain',
        ]);
    }
}
