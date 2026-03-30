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
            'title' => 'Blog – Conseils & Astuces Aéroville | Factory & Co',
            'description' => 'Découvrez nos articles sur Aéroville à Tremblay-en-France : accès transports, conseils pratiques, breakfast américain, cheesecake à emporter et histoire de Factory & Co.',
            'keywords' => 'blog factory co, conseils aéroville tremblay-en-france, transports aéroville, manger aéroville, restaurant tremblay-en-france, roissy, aéroville',
            'canonical' => route('blog.index'),
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
            'title' => $post->meta_title,
            'description' => $post->meta_description ?? $post->excerpt,
            'keywords' => '',
            'canonical' => route('blog.show', $post->slug),
        ];

        return view('pages.blog.show', compact('post', 'related', 'seo'));
    }
}
