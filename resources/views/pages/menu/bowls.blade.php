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
                'name' => 'Healthy & Bowls',
                'item' => route('menu.bowls')
            ]
        ]
    ];

    $menuItems = [];
    foreach ($products->get('bowls', collect()) as $p) {
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
        'name' => 'Healthy & Bowls – Factory & Co',
        'url' => route('menu.bowls'),
        'hasMenuSection' => [
            [
                '@type' => 'MenuSection',
                'name' => 'Healthy & Bowls',
                'hasMenuItem' => $menuItems
            ]
        ]
    ];

    $productSchemas = [];
    foreach ($products->get('bowls', collect()) as $p) {
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
                'url' => route('menu.bowls')
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
<nav class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Accueil</a><span class="bc-sep">›</span><span>Healthy &amp; Bowls</span></div></nav>
<div class="page-hero">
    <div class="page-hero-inner">
        <span class="section-tag">Silo 4 · Healthy &amp; Vegan</span>
        <h1>{{ $seo['h1'] }}</h1>
        <p>Super Bowls, salades sur mesure, options Veggie &amp; sans gluten. Manger sain et équilibré avant votre vol depuis Toulouse-Blagnac.</p>
    </div>
</div>
<section class="section section-light">
    <div class="container">
        <menu-product-grid :products="{{ json_encode($products) }}" category="bowls"></menu-product-grid>
    </div>
</section>
<section class="section section-dark">
    <div class="container">
        <div class="section-header"><h2 class="section-title light">Découvrez aussi</h2></div>
        <div class="internal-nav-grid">
            <a href="{{ route('menu.burgers') }}" class="internal-nav-card"><span>🍔</span><h3>L'Atelier Burger</h3><p>Smash Burgers, options Halal</p></a>
            <a href="{{ route('menu.bagels') }}" class="internal-nav-card"><span>🥯</span><h3>Bagels New-Yorkais</h3><p>Breakfast dès 8h30</p></a>
            <a href="{{ route('menu.cheesecake') }}" class="internal-nav-card"><span>🍰</span><h3>Cheesecake Factory</h3><p>Recettes du chef Jonathan</p></a>
        </div>
    </div>
</section>
@endsection
