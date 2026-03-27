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
                'name' => 'Bagels New-Yorkais',
                'item' => route('menu.bagels')
            ]
        ]
    ];

    $menuItems = [];
    foreach ($products->get('bagels', collect()) as $p) {
        $menuItems[] = [
            '@type' => 'MenuItem',
            'name' => $p->name,
            'description' => $p->description,
            'offers' => [
                '@type' => 'Offer',
                'price' => $p->price,
                'priceCurrency' => 'EUR'
            ]
        ];
    }

    $menuSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Menu',
        'name' => 'Bagels New-Yorkais – Factory & Co',
        'url' => route('menu.bagels'),
        'hasMenuSection' => [
            [
                '@type' => 'MenuSection',
                'name' => 'Bagels New-Yorkais',
                'hasMenuItem' => $menuItems
            ]
        ]
    ];

    $productSchemas = [];
    foreach ($products->get('bagels', collect()) as $p) {
        $productSchemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $p->name,
            'description' => $p->description,
            'offers' => [
                '@type' => 'Offer',
                'price' => number_format($p->price, 2, '.', ''),
                'priceCurrency' => 'EUR',
                'availability' => 'https://schema.org/InStock',
                'url' => route('menu.bagels')
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => '4.8',
                'reviewCount' => '500'
            ]
        ];
    }
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($menuSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@foreach ($productSchemas as $productSchema)
<script type="application/ld+json">{!! json_encode($productSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endforeach
@endpush
@section('content')
<nav class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Accueil</a><span class="bc-sep">›</span><span>Bagels New-Yorkais</span></div></nav>
<div class="page-hero">
    <div class="page-hero-inner">
        <span class="section-tag">Silo 2 · Breakfast &amp; Déjeuner</span>
        <h1>{{ $seo['h1'] }}</h1>
        <p>Bagels produits dans notre atelier central (Ivry-sur-Seine) selon la recette de Jonathan. Chauds, froids ou à composer parmi 12 ingrédients. Dès 8h30.</p>
    </div>
</div>
<section class="section section-light">
    <div class="container">
        <menu-product-grid :products="{{ json_encode($products) }}" category="bagels"></menu-product-grid>
    </div>
</section>
<section class="section section-dark">
    <div class="container">
        <div class="section-header"><h2 class="section-title light">Découvrez aussi</h2></div>
        <div class="internal-nav-grid">
            <a href="{{ route('menu.burgers') }}" class="internal-nav-card"><span>🍔</span><h3>L'Atelier Burger</h3><p>Smash Burgers, options Halal</p></a>
            <a href="{{ route('menu.cheesecake') }}" class="internal-nav-card"><span>🍰</span><h3>Cheesecake Factory</h3><p>Recettes du chef Jonathan</p></a>
            <a href="{{ route('menu.bowls') }}" class="internal-nav-card"><span>🥗</span><h3>Healthy &amp; Bowls</h3><p>Options Vegan &amp; Végétarien</p></a>
        </div>
    </div>
</section>
@endsection
