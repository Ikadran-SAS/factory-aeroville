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
                'name' => "L'Atelier Burger",
                'item' => route('menu.burgers')
            ]
        ]
    ];

    $menuItems = [];
    foreach ($products->get('smash', collect()) as $p) {
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
        'name' => "L'Atelier Burger – Factory & Co Val d'Europe",
        'url' => route('menu.burgers'),
        'hasMenuSection' => [
            [
                '@type' => 'MenuSection',
                'name' => 'Smash Burgers',
                'hasMenuItem' => $menuItems
            ]
        ]
    ];

    $productSchemas = [];
    foreach ($products->get('smash', collect()) as $p) {
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
                'url' => route('menu.burgers')
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

<nav class="breadcrumb">
    <div class="breadcrumb-inner">
        <a href="{{ route('home') }}">Accueil</a>
        <span class="bc-sep">›</span>
        <span>L'Atelier Burger</span>
    </div>
</nav>

<div class="page-hero">
    <div class="page-hero-inner">
        <span class="section-tag">Silo 1 · Best-seller</span>
        <h1>{{ $seo['h1'] }}</h1>
        <p>Viande Angus Rance d'origine Irlandaise, certifiée halal, smashée à la commande, jamais surgelée. Alternatives veggie disponibles pour tous les burgers et menus enfants.</p>
    </div>
</div>

<section class="section section-light">
    <div class="container">
        {{-- Composant Vue.js : grille produits avec filtres --}}
        <menu-product-grid
            :products="{{ json_encode($products) }}"
            category="burgers"
        ></menu-product-grid>

        {{-- Fallback HTML si Vue.js non chargé --}}
        <noscript>
            @foreach($products as $subcategory => $items)
                <h2 class="subcategory-title">{{ ucfirst($subcategory) }}</h2>
                <div class="products-grid">
                    @foreach($items as $product)
                        <div class="product-card">
                            @if($product->badge)
                                <span class="{{ $product->badge_class }}">{{ $product->badge }}</span>
                            @endif
                            @if($product->image_url)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" loading="lazy">
                            @endif
                            <div class="product-body">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                <div class="product-footer">
                                    <span class="product-price">{{ $product->formatted_price }}</span>
                                    @if($product->is_halal) <span class="badge-halal">Halal</span> @endif
                                    @if($product->is_vegetarian) <span class="badge-veggie">Végétarien</span> @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </noscript>
    </div>
</section>

{{-- Maillage interne --}}
<section class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title light">Découvrez aussi</h2>
        </div>
        <div class="internal-nav-grid">
            <a href="{{ route('menu.bagels') }}" class="internal-nav-card">
                <span>🥯</span>
                <h3>Bagels New-Yorkais</h3>
                <p>Breakfast dès 8h30</p>
            </a>
            <a href="{{ route('menu.cheesecake') }}" class="internal-nav-card">
                <span>🍰</span>
                <h3>Cheesecake Factory</h3>
                <p>Recettes du chef Jonathan</p>
            </a>
            <a href="{{ route('menu.bowls') }}" class="internal-nav-card">
                <span>🥗</span>
                <h3>Healthy &amp; Bowls</h3>
                <p>Options Vegan &amp; Végétarien</p>
            </a>
        </div>
    </div>
</section>

@endsection
