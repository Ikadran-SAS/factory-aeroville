@extends('layouts.app')
@section('title', $seo['title'])
@section('description', $seo['description'])
@section('canonical', $seo['canonical'])
@push('schema')
@php
    $articleSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $post->title,
        'description' => $post->excerpt,
        'image' => $post->image_url,
        'author' => [
            '@type' => 'Organization',
            'name' => 'Factory & Co Aéroville'
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Factory & Co',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('images/logo.png')
            ]
        ],
        'datePublished' => $post->published_at?->toIso8601String(),
        'dateModified' => $post->updated_at->toIso8601String()
    ];

    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Accueil',
                'item' => route('home')
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Guide du Voyageur',
                'item' => route('blog.index')
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $post->title,
                'item' => route('blog.show', $post->slug)
            ]
        ]
    ];
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush
@section('content')
<nav class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Accueil</a><span class="bc-sep">›</span><a href="{{ route('blog.index') }}">Guide du Voyageur</a><span class="bc-sep">›</span><span>{{ Str::limit($post->title, 40) }}</span></div></nav>
<article class="article-container">
    <div class="container">
        <header class="article-header">
            <span class="blog-tag">{{ $post->category }}</span>
            <h1>{{ $post->title }}</h1>
            <p class="article-meta">{{ $post->reading_time }} · Publié le {{ $post->published_at?->format('d/m/Y') }}</p>
            @if($post->image_url)
                <img src="{{ $post->image_url }}" alt="{{ $post->image_alt ?? $post->title }}" class="article-hero-img" loading="eager">
            @endif
        </header>
        <div class="article-body">
            {!! $post->content !!}
        </div>
        <footer class="article-footer">
            <a href="{{ route('blog.index') }}" class="btn btn-navy">← Retour au Guide du Voyageur</a>
        </footer>
    </div>
</article>
@if($related->count())
<section class="section section-light">
    <div class="container">
        <h2 class="section-title dark">Articles similaires</h2>
        <div class="blog-grid">
            @foreach($related as $post)
            <a href="{{ route('blog.show', $post->slug) }}" class="blog-card">
                @if($post->image_url)<img src="{{ $post->image_url }}" alt="{{ $post->title }}" loading="lazy">@endif
                <div class="blog-card-body">
                    <span class="blog-tag">{{ $post->category }}</span>
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->excerpt }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
