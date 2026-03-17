@extends('layouts.app')
@section('title', $seo['title'])
@section('description', $seo['description'])
@section('keywords', $seo['keywords'])
@section('canonical', $seo['canonical'])
@push('schema')
@php
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
                'name' => 'Blog',
                'item' => route('blog.index')
            ]
        ]
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush
@section('content')
<nav class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Accueil</a><span class="bc-sep">›</span><span>Blog</span></div></nav>
<div class="page-hero">
    <div class="page-hero-inner">
        <h1>Blog –<br><em>Val d'Europe & Conseils</em></h1>
        <p>Conseils pratiques, astuces shopping, guides gastronomiques et informations pratiques pour votre visite à Val d'Europe.</p>
    </div>
</div>
<section class="section section-light">
    <div class="container">
        @if($featured)
        <div class="blog-featured">
            <a href="{{ route('blog.show', $featured->slug) }}" class="blog-featured-link">
                @if($featured->image_url)
                    <img src="{{ $featured->image_url }}" alt="{{ $featured->image_alt ?? $featured->title }}" loading="lazy">
                @endif
                <div class="blog-featured-body">
                    <span class="blog-tag">{{ $featured->category }}</span>
                    <h2>{{ $featured->title }}</h2>
                    <p>{{ $featured->excerpt }}</p>
                    <span class="blog-meta">{{ $featured->reading_time }}</span>
                </div>
            </a>
        </div>
        @endif
        <div class="blog-grid">
            @foreach($posts->where('is_featured', false) as $post)
            <a href="{{ route('blog.show', $post->slug) }}" class="blog-card">
                @if($post->image_url)
                    <img src="{{ $post->image_url }}" alt="{{ $post->image_alt ?? $post->title }}" loading="lazy">
                @endif
                <div class="blog-card-body">
                    <span class="blog-tag">{{ $post->category }}</span>
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->excerpt }}</p>
                    <span class="blog-meta">{{ $post->reading_time }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
