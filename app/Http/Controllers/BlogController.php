<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::published()->orderBy('sort_order')->get();
        $featured = BlogPost::published()->featured()->first();

        $seo = [
            'title'       => 'Guide du Voyageur Val d\'Europe – Conseils & Astuces | Factory & Co',
            'description' => 'Le guide pratique de Val d\'Europe à Serris : accès transports, conseils pratiques, breakfast américain, cheesecake à emporter. Par Factory & Co.',
            'keywords'    => 'guide val d\'europe serris, conseils pratiques serris, transports val d\'europe, manger val d\'europe',
            'canonical'   => route('blog.index'),
        ];

        return view('pages.blog.index', compact('posts', 'featured', 'seo'));
    }

    public function show(string $slug)
    {
        $post = BlogPost::published()->where('slug', $slug)->firstOrFail();
        $related = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->take(3)
            ->get();

        $seo = [
            'title'       => $post->meta_title,
            'description' => $post->meta_description ?? $post->excerpt,
            'keywords'    => '',
            'canonical'   => route('blog.show', $post->slug),
        ];

        return view('pages.blog.show', compact('post', 'related', 'seo'));
    }
}
