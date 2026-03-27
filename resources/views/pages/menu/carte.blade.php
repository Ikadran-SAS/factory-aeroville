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
                'name' => 'La Carte',
                'item' => route('menu.index')
            ]
        ]
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

{{-- BREADCRUMB --}}
<nav class="breadcrumb">
    <div class="breadcrumb-inner">
        <a href="{{ route('home') }}">Accueil</a>
        <span class="bc-sep">›</span>
        <span>La Carte</span>
    </div>
</nav>

{{-- ════════════════════════════════════════════
     HERO SECTION - PREMIUM LANDING WITH VIDEO
════════════════════════════════════════════ --}}
<section class="hero hero-carte">
    {{-- Video Background --}}
    <video class="hero-video" autoplay muted loop playsinline>
        <source src="{{ asset('videos/hero-carte.mp4') }}" type="video/mp4">
    </video>

    {{-- Animated Background Shapes --}}
    <div class="hero-shapes">
        <div class="shape shape-burger"></div>
        <div class="shape shape-fries"></div>
        <div class="shape shape-circle-1"></div>
        <div class="shape shape-circle-2"></div>
        <div class="shape shape-circle-3"></div>
    </div>

    {{-- Gradient Overlay --}}
    <div class="hero-overlay"></div>

    {{-- Hero Content --}}
    <div class="hero-content">
        <span class="section-tag">🍔 LA CARTE</span>
        <h1>Un voyage culinaire<br>sans fin</h1>
        <p>Découvrez nos incontournables New York et nos créations exclusives</p>
        <div class="hero-buttons">
            <button class="btn btn-pink scroll-to-categories" aria-label="Parcourir la carte">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
                Parcourir la carte
            </button>
            <a href="{{ asset('pdf/Carte_Classique_18AVRIL (1).pdf') }}" download class="btn btn-outline-white" aria-label="Télécharger la carte PDF">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19v-7m0 0V5m0 7H5m7 0h7"></path>
                </svg>
                Télécharger la carte
            </a>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="scroll-indicator">
        <div class="scroll-dot"></div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     STICKY CATEGORY NAVIGATION
════════════════════════════════════════════ --}}
<nav class="category-nav" id="category-nav">
    <a href="#burgers" class="category-pill" data-category="burgers">
        <span class="pill-icon">🍔</span>
        <span class="pill-label">Burgers</span>
    </a>
    <a href="#bagels" class="category-pill" data-category="bagels">
        <span class="pill-icon">🥯</span>
        <span class="pill-label">Bagels</span>
    </a>
    <a href="#cheesecake" class="category-pill" data-category="cheesecake">
        <span class="pill-icon">🍰</span>
        <span class="pill-label">Cheesecake</span>
    </a>
    <a href="#bowls" class="category-pill" data-category="bowls">
        <span class="pill-icon">🥗</span>
        <span class="pill-label">Bowls</span>
    </a>
</nav>

{{-- ════════════════════════════════════════════
     CATEGORY SECTIONS
════════════════════════════════════════════ --}}

{{-- BURGERS --}}
<section class="category-section" id="burgers">
    <div class="container">
        <div class="category-hero">
            <div class="category-badge">
                <span class="badge-icon">🍔</span>
                NYC SMASH BURGERS
            </div>
            <h2 class="category-title">L'Atelier Burger</h2>
            <p class="category-subtitle">Viande Angus Rance d'origine Irlandaise, certifiée halal, smashée à la commande</p>
            <p class="category-description">Chaque burger est une création culinaire pensée pour séduire vos papilles. Sauce secrète depuis 1989, garnitures fraîches, pain grillé à la perfection.</p>
        </div>

        <div class="items-grid">
            @forelse ($burgers as $subcategory => $items)
                @foreach ($items as $product)
                    <div class="item-card">
                        <div class="item-image" style="background-image: url('{{ asset('images/burger.webp') }}')">
                            <span class="price-badge">{{ number_format($product->price, 2, ',', '') }}€</span>
                        </div>
                        <div class="item-content">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
            @empty
                <p class="text-center">Aucun burger disponible</p>
            @endforelse
        </div>
    </div>
</section>

{{-- BAGELS --}}
<section class="category-section category-section-alt" id="bagels">
    <div class="container">
        <div class="category-hero">
            <div class="category-badge">
                <span class="badge-icon">🥯</span>
                BAGELS NEW-YORKAIS
            </div>
            <h2 class="category-title">Breakfast Américain</h2>
            <p class="category-subtitle">Dès 8h30 - Recette authentique à farine canadienne</p>
            <p class="category-description">Nos bagels sont préparés en-house avec la farine canadienne traditionnelle. Chauds, froids, à composer selon vos envies.</p>
        </div>

        <div class="items-grid">
            @forelse ($bagels as $subcategory => $items)
                @foreach ($items as $product)
                    <div class="item-card">
                        <div class="item-image" style="background: linear-gradient(135deg, #F5C3DB 0%, #E8A0C0 100%)">
                            <span class="price-badge">{{ number_format($product->price, 2, ',', '') }}€</span>
                        </div>
                        <div class="item-content">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
            @empty
                <p class="text-center">Aucun bagel disponible</p>
            @endforelse
        </div>
    </div>
</section>

{{-- CHEESECAKE --}}
<section class="category-section" id="cheesecake">
    <div class="container">
        <div class="category-hero">
            <div class="category-badge">
                <span class="badge-icon">🍰</span>
                CHEESECAKE FACTORY
            </div>
            <h2 class="category-title">Pâtisseries Premium</h2>
            <p class="category-subtitle">Recettes authen tiques du Chef Jonathan</p>
            <p class="category-description">Le vrai New York cheesecake préparé selon les traditions. Textures parfaites, saveurs authentiques, portions généreuses.</p>
        </div>

        <div class="items-grid">
            @forelse ($cheesecakes as $subcategory => $items)
                @foreach ($items as $product)
                    <div class="item-card">
                        <div class="item-image" style="background-image: url('{{ asset('images/desserts.webp') }}')">
                            <span class="price-badge">{{ number_format($product->price, 2, ',', '') }}€</span>
                        </div>
                        <div class="item-content">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
            @empty
                <p class="text-center">Aucun cheesecake disponible</p>
            @endforelse
        </div>
    </div>
</section>

{{-- BOWLS --}}
<section class="category-section category-section-alt" id="bowls">
    <div class="container">
        <div class="category-hero">
            <div class="category-badge">
                <span class="badge-icon">🥗</span>
                SUPER BOWLS SAINS
            </div>
            <h2 class="category-title">Healthy & Bien-être</h2>
            <p class="category-subtitle">Vegan, Végétarien, et délicieux</p>
            <p class="category-description">Manger sain sans compromis sur le goût. Nos bowls sont composés avec des ingrédients frais, biologiques quand possible.</p>
        </div>

        <div class="items-grid">
            @forelse ($bowls as $subcategory => $items)
                @foreach ($items as $product)
                    <div class="item-card">
                        <div class="item-image" style="background: linear-gradient(135deg, #90EE90 0%, #7CFC00 100%)">
                            <span class="price-badge">{{ number_format($product->price, 2, ',', '') }}€</span>
                        </div>
                        <div class="item-content">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
            @empty
                <p class="text-center">Aucun bowl disponible</p>
            @endforelse
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     CTA FINAL - COMMANDER MAINTENANT
════════════════════════════════════════════ --}}
<section class="section cta-final-carte">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à déguster ?</h2>
            <p>Venez nous retrouver au cœur de Val d'Europe</p>
            <div class="cta-buttons">
                <a href="javascript:void(0)" onclick="window.factoryCoNav && window.factoryCoNav.openNavigationModal()" class="btn btn-pink btn-lg">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    Venir au restaurant
                </a>
            </div>
        </div>
    </div>
</section>

{{-- JavaScript for Animations & Interactions --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Scroll to categories button
    const scrollBtn = document.querySelector('.scroll-to-categories');
    if (scrollBtn) {
        scrollBtn.addEventListener('click', function() {
            const nav = document.getElementById('category-nav');
            if (nav) {
                nav.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

    // Category pill active state on scroll
    const categoryPills = document.querySelectorAll('.category-pill');
    const categorySections = document.querySelectorAll('.category-section');

    function updateActiveCategory() {
        let current = '';
        categorySections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (window.pageYOffset >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });

        categoryPills.forEach(pill => {
            pill.classList.remove('active');
            if (pill.getAttribute('data-category') === current) {
                pill.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', updateActiveCategory);

    // Smooth scroll for category pills
    categoryPills.forEach(pill => {
        pill.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-category');
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
});
</script>

@endsection
