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
                'name' => 'Notre Concept',
                'item' => route('concept')
            ]
        ]
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')
<nav class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Accueil</a><span class="bc-sep">›</span><span>Notre Concept</span></div></nav>

{{-- ════════════════════════════════════════════
     HERO SECTION
════════════════════════════════════════════ --}}
<section class="hero hero-concept">
    <video class="hero-concept-video" autoplay muted loop playsinline>
        <source src="{{ asset('videos/hero-concept.mp4') }}" type="video/mp4">
    </video>
    <div class="hero-concept-overlay"></div>
    <div class="hero-content">
        <span class="section-tag">🍔</span>
        <h1>Bien plus qu'un restaurant. Une expérience.</h1>
        <p>Un aller simple pour New York… sans quitter votre centre commercial.</p>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : PITCH EMOTIONNEL (REDESIGNÉ)
════════════════════════════════════════════ --}}
<section class="section pitch-section-redesigned">
    <div class="container">
        <div class="pitch-redesigned-grid">
            {{-- Colonne Contenu --}}
            <div class="pitch-redesigned-content">
                {{-- Badge --}}
                <span class="pitch-badge">
                    <span class="pitch-badge-icon">💭</span>
                    Notre Philosophie
                </span>

                {{-- Titre principal avec highlight --}}
                <h2 class="pitch-redesigned-title">
                    Chez nous, on ne vient<br>
                    <span class="pitch-highlight">simplement manger.</span>
                </h2>

                {{-- Accent line --}}
                <div class="pitch-accent-line"></div>

                {{-- Lead --}}
                <p class="pitch-redesigned-lead">
                    On vient vivre un moment : <span class="pitch-emphasis">gourmand, généreux, réconfortant.</span>
                </p>

                {{-- Description --}}
                <p class="pitch-redesigned-description">
                    Entre burgers fondants, desserts iconiques et ambiance chaleureuse, chaque visite devient une parenthèse hors du temps. Ici, chaque détail est conçu pour transformer un simple repas en une véritable expérience.
                </p>

                {{-- CTA Button --}}
                <div class="pitch-cta-group">
                    <a href="javascript:void(0)" onclick="window.factoryCoNav && window.factoryCoNav.openNavigationModal()" class="btn btn-pink">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Venir chez nous
                    </a>
                </div>
            </div>

            {{-- Colonne Image --}}
            <div class="pitch-redesigned-image">
                <div class="pitch-image-wrapper">
                    <img src="{{ asset('images/factory-val-interieur.webp') }}" alt="Intérieur Factory & Co - Atmosphère du diner" loading="lazy">
                    {{-- Accent corner --}}
                    <div class="pitch-image-accent"></div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ════════════════════════════════════════════
     SECTION : NOTRE CONCEPT (REDESIGNÉ)
════════════════════════════════════════════ --}}
<section class="section section-dark concept-section-redesigned">
    <div class="container">
        {{-- Header Premium --}}
        <div class="concept-header-redesigned">
            <h2 class="concept-title-redesigned">
                Notre <span class="concept-highlight">Concept</span>
            </h2>
            <p class="concept-subtitle-redesigned">L'énergie new-yorkaise, le savoir-faire français</p>
        </div>

        {{-- Intro text en citation --}}
        <blockquote class="concept-quote">
            Notre concept repose sur une idée simple : proposer une cuisine gourmande et qualitative, dans un univers inspiré des diners new-yorkais.
        </blockquote>

        {{-- 3 Piliers en cards --}}
        <div class="concept-pillars-grid">
            {{-- Pilier 1 --}}
            <div class="concept-pillar-card">
                <svg class="pillar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="32" height="32">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                <div class="pillar-content">
                    <h3 class="pillar-title">La rapidité<br>rencontre la qualité</h3>
                    <p class="pillar-description">
                        Chaque burger smashé sur plaque brûlante, chaque commande préparée à la minute. Fast, mais premium.
                    </p>
                </div>
                <div class="pillar-accent-bar"></div>
            </div>

            {{-- Pilier 2 --}}
            <div class="concept-pillar-card">
                <svg class="pillar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="32" height="32">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div class="pillar-content">
                    <h3 class="pillar-title">La street food<br>devient expérience</h3>
                    <p class="pillar-description">
                        Plus qu'un repas, c'est un moment. Chaque détail immersif crée une véritable parenthèse gourmande.
                    </p>
                </div>
                <div class="pillar-accent-bar"></div>
            </div>

            {{-- Pilier 3 --}}
            <div class="concept-pillar-card">
                <svg class="pillar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="32" height="32">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                <div class="pillar-content">
                    <h3 class="pillar-title">Chaque détail<br>pensé pour vous</h3>
                    <p class="pillar-description">
                        De l'ambiance au service, tout est conçu pour transformer un simple repas en souvenir délicieux.
                    </p>
                </div>
                <div class="pillar-accent-bar"></div>
            </div>
        </div>

        {{-- Conclusion impactante --}}
        <div class="concept-conclusion">
            <p class="concept-conclusion-text">
                Ici, tout est préparé avec exigence, dans un esprit <span class="concept-conclusion-highlight">fast casual premium</span> : rapide, mais jamais bâclé.
            </p>
            <p class="concept-conclusion-subtext">
                ✓ Factory & Co Depuis 2008
            </p>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : L'EXPÉRIENCE CLIENT (REDESIGNÉE)
════════════════════════════════════════════ --}}
<section class="section experience-section-redesigned">
    <div class="container">
        {{-- Header Premium --}}
        <div class="experience-header-redesigned">
            <h2 class="experience-title-redesigned">
                L'<span class="experience-highlight">Expérience Client</span>
            </h2>
            <p class="experience-subtitle-redesigned">Un moment qui s'adapte à vous</p>
        </div>

        {{-- Intro text en citation premium --}}
        <blockquote class="experience-intro-quote">
            Que vous soyez en pleine session shopping, en pause déjeuner ou en sortie détente, notre restaurant s'intègre naturellement dans votre journée.
        </blockquote>

        {{-- 4 Moments/Expériences en grille 2x2 premium --}}
        <div class="experience-moments-grid">
            {{-- Moment 1: Prendre le temps --}}
            <div class="experience-moment-card">
                <div class="moment-icon-wrapper">
                    <svg class="moment-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="moment-content">
                    <h3 class="moment-title">Prendre le temps</h3>
                    <p class="moment-description">Vous poser et savourer chaque bouchée</p>
                </div>
                <div class="moment-accent"></div>
            </div>

            {{-- Moment 2: Manger rapidement --}}
            <div class="experience-moment-card">
                <div class="moment-icon-wrapper">
                    <svg class="moment-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="moment-content">
                    <h3 class="moment-title">Manger rapidement</h3>
                    <p class="moment-description">Sans compromis sur la qualité</p>
                </div>
                <div class="moment-accent"></div>
            </div>

            {{-- Moment 3: Partager un moment --}}
            <div class="experience-moment-card">
                <div class="moment-icon-wrapper">
                    <svg class="moment-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
                <div class="moment-content">
                    <h3 class="moment-title">Partager un moment</h3>
                    <p class="moment-description">Convivial et chaleureux</p>
                </div>
                <div class="moment-accent"></div>
            </div>

            {{-- Moment 4: S'offrir une pause --}}
            <div class="experience-moment-card">
                <div class="moment-icon-wrapper">
                    <svg class="moment-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="moment-content">
                    <h3 class="moment-title">S'offrir une pause</h3>
                    <p class="moment-description">Gourmande et réconfortante</p>
                </div>
                <div class="moment-accent"></div>
            </div>
        </div>

        {{-- Conclusion impactante --}}
        <div class="experience-conclusion">
            <p class="experience-conclusion-text">
                Ici, tout est conçu pour être <span class="experience-conclusion-highlight">simple, fluide et agréable.</span>
            </p>
            <p class="experience-conclusion-subtext">
                ✓ Factory & Co - À chaque moment de votre journée
            </p>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : NOTRE CUISINE (REDESIGNÉE)
════════════════════════════════════════════ --}}
<section class="section section-dark cuisine-section-redesigned">
    <div class="container">
        {{-- Header Premium avec Badge --}}
        <div class="cuisine-header-redesigned">
            <span class="cuisine-badge">
                <span class="cuisine-badge-icon">🍔</span>
                Notre Cuisine
            </span>
            <h2 class="cuisine-title-redesigned">
                Généreuse, <span class="cuisine-highlight">gourmande,</span> assumée
            </h2>
            <p class="cuisine-subtitle-redesigned">
                Notre cuisine célèbre le plaisir
            </p>
        </div>

        {{-- Intro text avec accent --}}
        <blockquote class="cuisine-intro-quote">
            Chaque assiette est une promesse de gourmandise, chaque détail pensé pour créer un moment mémorable.
        </blockquote>

        {{-- Slider Wrapper avec Navigation --}}
        <div class="cuisine-slider-wrapper">
            <button class="slider-nav slider-nav-prev" id="slider-prev" aria-label="Previous">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>

            {{-- Grille 4 Catégories avec cartes PREMIUM redesignées --}}
            <div class="cuisine-categories-grid" id="cuisine-slider">
            {{-- Catégorie 1: Burgers --}}
            <div class="cuisine-card-premium">
                {{-- Background Layer avec Ashley.webp blurred + Image produit + Overlay --}}
                <div class="card-bg-container">
                    <div class="card-bg-ashley"></div>
                    <div class="card-bg-image" style="background-image: url('/images/burger.webp')"></div>
                    <div class="card-overlay"></div>
                </div>

                {{-- Glow Effect Border --}}
                <div class="card-glow-border"></div>

                {{-- Content Layer avec Glass-morphism --}}
                <div class="card-content-glass">
                    {{-- SVG Icon Premium --}}
                    <svg class="card-icon-premium" viewBox="0 0 64 64" fill="none">
                        <defs>
                            <linearGradient id="grad-burger" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#F5C3DB;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#CC3366;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        {{-- Burger: 2 buns + 3 layers --}}
                        <circle cx="32" cy="20" r="11" stroke="url(#grad-burger)" stroke-width="2.5" fill="none"/>
                        <path d="M 21 20 L 43 20" stroke="url(#grad-burger)" stroke-width="2.5" stroke-linecap="round"/>
                        <circle cx="32" cy="28" r="10" stroke="url(#grad-burger)" stroke-width="2.5" fill="none"/>
                        <path d="M 22 28 L 42 28" stroke="url(#grad-burger)" stroke-width="2.5" stroke-linecap="round"/>
                        <circle cx="32" cy="36" r="11" stroke="url(#grad-burger)" stroke-width="2.5" fill="none"/>
                        <path d="M 21 36 L 43 36" stroke="url(#grad-burger)" stroke-width="2.5" stroke-linecap="round"/>
                    </svg>

                    {{-- Content --}}
                    <div class="card-text-content">
                        <h3 class="card-title">Burgers</h3>
                        <p class="card-description">Généreux au pain moelleux</p>
                    </div>

                    {{-- Accent Line --}}
                    <div class="card-accent-line"></div>
                </div>

                {{-- Shimmer Effect --}}
                <div class="card-shimmer"></div>
            </div>

            {{-- Catégorie 2: Recettes --}}
            <div class="cuisine-card-premium">
                {{-- Background Layer --}}
                <div class="card-bg-container">
                    <div class="card-bg-ashley"></div>
                    <div class="card-bg-image" style="background-image: url('/images/recettes.webp')"></div>
                    <div class="card-overlay"></div>
                </div>

                {{-- Glow Effect Border --}}
                <div class="card-glow-border"></div>

                {{-- Content Layer --}}
                <div class="card-content-glass">
                    {{-- SVG Icon Premium --}}
                    <svg class="card-icon-premium" viewBox="0 0 64 64" fill="none">
                        <defs>
                            <linearGradient id="grad-recettes" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#F5C3DB;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#CC3366;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        {{-- Fork & Knife Art Deco --}}
                        {{-- Fork left --}}
                        <path d="M 18 42 L 18 22 M 18 22 L 14 18 M 18 22 L 18 18 M 18 22 L 22 18 M 14 18 L 14 22 M 22 18 L 22 22" stroke="url(#grad-recettes)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        {{-- Knife right --}}
                        <path d="M 46 42 L 46 18 M 46 18 L 44 16 L 48 16 M 48 18 L 50 20 L 50 40" stroke="url(#grad-recettes)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        {{-- Plate center --}}
                        <circle cx="32" cy="36" r="14" stroke="url(#grad-recettes)" stroke-width="2.5" fill="none"/>
                        <circle cx="32" cy="36" r="10" stroke="url(#grad-recettes)" stroke-width="1.5" fill="none" opacity="0.5"/>
                    </svg>

                    {{-- Content --}}
                    <div class="card-text-content">
                        <h3 class="card-title">Recettes</h3>
                        <p class="card-description">Travaillées et savoureuses</p>
                    </div>

                    {{-- Accent Line --}}
                    <div class="card-accent-line"></div>
                </div>

                {{-- Shimmer Effect --}}
                <div class="card-shimmer"></div>
            </div>

            {{-- Catégorie 3: Desserts --}}
            <div class="cuisine-card-premium">
                {{-- Background Layer --}}
                <div class="card-bg-container">
                    <div class="card-bg-ashley"></div>
                    <div class="card-bg-image" style="background-image: url('/images/desserts.webp')"></div>
                    <div class="card-overlay"></div>
                </div>

                {{-- Glow Effect Border --}}
                <div class="card-glow-border"></div>

                {{-- Content Layer --}}
                <div class="card-content-glass">
                    {{-- SVG Icon Premium --}}
                    <svg class="card-icon-premium" viewBox="0 0 64 64" fill="none">
                        <defs>
                            <linearGradient id="grad-desserts" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#F5C3DB;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#CC3366;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        {{-- Cake: 3 layers + cherry on top --}}
                        <rect x="16" y="28" width="32" height="8" rx="1" stroke="url(#grad-desserts)" stroke-width="2.5" fill="none"/>
                        <rect x="18" y="20" width="28" height="8" rx="1" stroke="url(#grad-desserts)" stroke-width="2.5" fill="none"/>
                        <rect x="20" y="12" width="24" height="8" rx="1" stroke="url(#grad-desserts)" stroke-width="2.5" fill="none"/>
                        {{-- Cherry on top --}}
                        <circle cx="32" cy="10" r="3" stroke="url(#grad-desserts)" stroke-width="2" fill="none"/>
                        <path d="M 32 7 Q 30 5 28 4" stroke="url(#grad-desserts)" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                        {{-- Plate base --}}
                        <ellipse cx="32" cy="38" rx="18" ry="4" stroke="url(#grad-desserts)" stroke-width="2" fill="none"/>
                    </svg>

                    {{-- Content --}}
                    <div class="card-text-content">
                        <h3 class="card-title">Desserts</h3>
                        <p class="card-description">Iconiques et régressifs</p>
                    </div>

                    {{-- Accent Line --}}
                    <div class="card-accent-line"></div>
                </div>

                {{-- Shimmer Effect --}}
                <div class="card-shimmer"></div>
            </div>

            {{-- Catégorie 4: Boissons --}}
            <div class="cuisine-card-premium">
                {{-- Background Layer --}}
                <div class="card-bg-container">
                    <div class="card-bg-ashley"></div>
                    <div class="card-bg-image" style="background-image: url('/images/boissons.webp')"></div>
                    <div class="card-overlay"></div>
                </div>

                {{-- Glow Effect Border --}}
                <div class="card-glow-border"></div>

                {{-- Content Layer --}}
                <div class="card-content-glass">
                    {{-- SVG Icon Premium --}}
                    <svg class="card-icon-premium" viewBox="0 0 64 64" fill="none">
                        <defs>
                            <linearGradient id="grad-boissons" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#F5C3DB;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#CC3366;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        {{-- Glass: minimaliste --}}
                        <path d="M 22 18 L 26 40 Q 26 42 28 42 L 36 42 Q 38 42 38 40 L 42 18 Z" stroke="url(#grad-boissons)" stroke-width="2.5" fill="none" stroke-linejoin="round"/>
                        {{-- Straw --}}
                        <line x1="30" y1="16" x2="28" y2="42" stroke="url(#grad-boissons)" stroke-width="1.5" stroke-linecap="round"/>
                        {{-- Liquid level inside --}}
                        <path d="M 27 32 Q 28 32 32 32 Q 36 32 37 32" stroke="url(#grad-boissons)" stroke-width="1.5" fill="none" opacity="0.6"/>
                    </svg>

                    {{-- Content --}}
                    <div class="card-text-content">
                        <h3 class="card-title">Boissons</h3>
                        <p class="card-description">Gourmandes et rafraîchissantes</p>
                    </div>

                    {{-- Accent Line --}}
                    <div class="card-accent-line"></div>
                </div>

                {{-- Shimmer Effect --}}
                <div class="card-shimmer"></div>
            </div>
        </div>

            <button class="slider-nav slider-nav-next" id="slider-next" aria-label="Next">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>
        </div>

        {{-- Engagement Box avec checklist --}}
        <div class="cuisine-engagement-box">
            <div class="engagement-content">
                <h3 class="engagement-title">Ce que nous garantissons</h3>
                <ul class="engagement-checklist">
                    <li class="checklist-item">
                        <span class="checklist-badge">✔️</span>
                        <span class="checklist-text">Du goût</span>
                    </li>
                    <li class="checklist-item">
                        <span class="checklist-badge">✔️</span>
                        <span class="checklist-text">De la texture</span>
                    </li>
                    <li class="checklist-item">
                        <span class="checklist-badge">✔️</span>
                        <span class="checklist-text">De la satisfaction</span>
                    </li>
                </ul>
                <p class="engagement-tagline">
                    Parce que bien manger, c'est aussi se faire plaisir sans compromis.
                </p>
            </div>
            {{-- Image ashley subtle en arrière-plan --}}
            <div class="engagement-image-bg"></div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : POURQUOI NOUS CHOISIR - VISUELS FORTS
════════════════════════════════════════════ --}}
<section class="section why-choose-visual-hero">
    <div class="container">
        {{-- Header Premium --}}
        <div class="why-choose-header">
            <span class="why-choose-badge">
                <span class="why-choose-badge-icon">⭐</span>
                Pourquoi Nous Choisir
            </span>
            <h2 class="why-choose-title">
                <span class="why-choose-highlight">L'expérience</span> fait la différence
            </h2>
            <p class="why-choose-subtitle">Plus qu'un restaurant, une destination mémorable</p>
        </div>

        {{-- CARD 1: Identité Forte --}}
        <div class="why-choose-card-visual">
            <div class="card-visual-image">
                <img src="{{ asset('images/factory-val-interieur.webp') }}" alt="Intérieur Factory & Co Toulouse - Design unique et mémorable" loading="lazy">
                <div class="card-visual-overlay-dark"></div>
            </div>
            <div class="card-visual-content">
                <div class="card-visual-counter">01</div>
                <div class="card-visual-icon">
                    <svg viewBox="0 0 64 64" fill="none">
                        <defs>
                            <linearGradient id="grad-visual-1" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#F5C3DB;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#CC3366;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <path d="M32 8 C32 8, 26 18, 26 26 C26 33.732, 28.686 40, 32 40 C35.314 40, 38 33.732, 38 26 C38 18, 32 8, 32 8 Z" stroke="url(#grad-visual-1)" stroke-width="2.5" fill="none" stroke-linejoin="round"/>
                        <path d="M32 18 C32 18, 28 24, 28 28 C28 31.314, 29.791 34, 32 34 C34.209 34, 36 31.314, 36 28 C36 24, 32 18, 32 18 Z" stroke="url(#grad-visual-1)" stroke-width="2.5" fill="none" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="card-visual-title">Identité Forte</h3>
                <p class="card-visual-description">Un design unique et reconnaissable qui marque les esprits dès l'entrée</p>
                <div class="card-visual-accent"></div>
            </div>
        </div>

        {{-- CARD 2: Ambiance Immersive --}}
        <div class="why-choose-card-visual card-visual-reverse">
            <div class="card-visual-image">
                <img src="{{ asset('images/burger.webp') }}" alt="Burger Factory & Co - Qualité et générosité" loading="lazy">
                <div class="card-visual-overlay-dark"></div>
            </div>
            <div class="card-visual-content">
                <div class="card-visual-counter">02</div>
                <div class="card-visual-icon">
                    <svg viewBox="0 0 64 64" fill="none">
                        <defs>
                            <linearGradient id="grad-visual-2" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#F5C3DB;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#CC3366;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <rect x="12" y="16" width="40" height="32" rx="2" stroke="url(#grad-visual-2)" stroke-width="2.5" fill="none"/>
                        <path d="M12 24 L52 24" stroke="url(#grad-visual-2)" stroke-width="2.5"/>
                        <rect x="18" y="18" width="12" height="6" stroke="url(#grad-visual-2)" stroke-width="2.5" fill="none"/>
                        <rect x="34" y="18" width="12" height="6" stroke="url(#grad-visual-2)" stroke-width="2.5" fill="none"/>
                    </svg>
                </div>
                <h3 class="card-visual-title">Ambiance Immersive</h3>
                <p class="card-visual-description">Une atmosphère energique qui vous transporte loin de l'ordinaire</p>
                <div class="card-visual-accent"></div>
            </div>
        </div>

        {{-- CARD 3: Cuisine Généreuse --}}
        <div class="why-choose-card-visual">
            <div class="card-visual-image">
                <img src="{{ asset('images/desserts.webp') }}" alt="Cheesecake Factory & Co - Desserts gourmands" loading="lazy">
                <div class="card-visual-overlay-dark"></div>
            </div>
            <div class="card-visual-content">
                <div class="card-visual-counter">03</div>
                <div class="card-visual-icon">
                    <svg viewBox="0 0 64 64" fill="none">
                        <defs>
                            <linearGradient id="grad-visual-3" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#F5C3DB;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#CC3366;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <circle cx="32" cy="32" r="18" stroke="url(#grad-visual-3)" stroke-width="2.5" fill="none"/>
                        <path d="M24 28 Q32 22, 40 28" stroke="url(#grad-visual-3)" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 35 Q32 40, 44 35" stroke="url(#grad-visual-3)" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="card-visual-title">Cuisine Généreuse</h3>
                <p class="card-visual-description">Des produits frais, des portions généreuses, une qualité sans compromis</p>
                <div class="card-visual-accent"></div>
            </div>
        </div>

        {{-- CARD 4: Expérience Complète --}}
        <div class="why-choose-card-visual card-visual-reverse">
            <div class="card-visual-image">
                <img src="{{ asset('images/factory-val-3.webp') }}" alt="Ambiance Factory & Co - Moments en famille et entre amis" loading="lazy">
                <div class="card-visual-overlay-dark"></div>
            </div>
            <div class="card-visual-content">
                <div class="card-visual-counter">04</div>
                <div class="card-visual-icon">
                    <svg viewBox="0 0 64 64" fill="none">
                        <defs>
                            <linearGradient id="grad-visual-4" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#F5C3DB;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#CC3366;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <path d="M32 48 C32 48, 16 36, 16 26 C16 20, 20 16, 24 16 C26.5 16, 28.8 17.2, 30.4 19 C31.2 19.9, 32 20.8, 32 20.8 C32 20.8, 32.8 19.9, 33.6 19 C35.2 17.2, 37.5 16, 40 16 C44 16, 48 20, 48 26 C48 36, 32 48, 32 48 Z" stroke="url(#grad-visual-4)" stroke-width="2.5" fill="none" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="card-visual-title">Expérience Complète</h3>
                <p class="card-visual-description">Entrée, plat, dessert et moment précieux, tout en un seul endroit</p>
                <div class="card-visual-accent"></div>
            </div>
        </div>

        {{-- Conclusion Impactante --}}
        <div class="why-choose-conclusion-visual">
            <blockquote class="conclusion-quote">
                <span class="quote-mark">"</span>
                <p>Ici, vous ne consommez pas une simple commande.</p>
                <p class="conclusion-highlight">Vous vivez une expérience.</p>
                <span class="quote-mark close">"</span>
            </blockquote>
        </div>
    </div>
</section>


{{-- ════════════════════════════════════════════
     SECTION : L'AMBIANCE DU LIEU (REDESIGNÉE)
════════════════════════════════════════════ --}}
<section class="section ambiance-section-redesigned">
    <div class="container">
        {{-- Header Premium --}}
        <div class="ambiance-header-redesigned">
            <span class="ambiance-badge">
                <span class="ambiance-badge-icon">✨</span>
                L'Ambiance du Lieu
            </span>
            <h2 class="ambiance-title-redesigned">
                Un espace <span class="ambiance-highlight">vivant et mémorable</span>
            </h2>
            <p class="ambiance-subtitle-redesigned">Dès l'entrée, l'atmosphère vous transporte</p>
        </div>

        {{-- Intro Quote --}}
        <blockquote class="ambiance-intro-quote">
            Factory & Co n'est pas juste un restaurant. C'est un univers pensé dans les moindres détails pour transformer chaque visite en souvenir.
        </blockquote>

        {{-- 3 Premium Ambiance Cards avec images --}}
        <div class="ambiance-cards-grid">
            {{-- Card 1: Design Urbain --}}
            <div class="ambiance-card-premium">
                <div class="ambiance-card-image">
                    <img src="{{ asset('images/factory-val-interieur.webp') }}" alt="Design urbain Factory & Co - Intérieur moderne et inspiré" loading="lazy">
                    <div class="ambiance-card-overlay"></div>
                </div>
                <div class="ambiance-card-content">
                    <div class="ambiance-card-icon">
                        <svg viewBox="0 0 64 64" fill="none">
                            <defs>
                                <linearGradient id="grad-ambiance-1" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#F5C3DB;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#CC3366;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <rect x="12" y="18" width="40" height="30" rx="2" stroke="url(#grad-ambiance-1)" stroke-width="2.5" fill="none"/>
                            <line x1="12" y1="26" x2="52" y2="26" stroke="url(#grad-ambiance-1)" stroke-width="2"/>
                            <rect x="16" y="20" width="6" height="6" stroke="url(#grad-ambiance-1)" stroke-width="2" fill="none"/>
                            <rect x="42" y="20" width="6" height="6" stroke="url(#grad-ambiance-1)" stroke-width="2" fill="none"/>
                        </svg>
                    </div>
                    <h3 class="ambiance-card-title">Design Urbain</h3>
                    <p class="ambiance-card-description">Inspiré des grandes villes, notre intérieur fusionne style new-yorkais et savoir-faire français</p>
                    <div class="ambiance-card-accent"></div>
                </div>
            </div>

            {{-- Card 2: Ambiance Conviviale --}}
            <div class="ambiance-card-premium">
                <div class="ambiance-card-image">
                    <img src="{{ asset('images/factory-val-3.webp') }}" alt="Ambiance conviviale Factory & Co - Moments en famille" loading="lazy">
                    <div class="ambiance-card-overlay"></div>
                </div>
                <div class="ambiance-card-content">
                    <div class="ambiance-card-icon">
                        <svg viewBox="0 0 64 64" fill="none">
                            <defs>
                                <linearGradient id="grad-ambiance-2" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#F5C3DB;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#CC3366;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <circle cx="22" cy="28" r="8" stroke="url(#grad-ambiance-2)" stroke-width="2.5" fill="none"/>
                            <circle cx="32" cy="18" r="8" stroke="url(#grad-ambiance-2)" stroke-width="2.5" fill="none"/>
                            <circle cx="42" cy="28" r="8" stroke="url(#grad-ambiance-2)" stroke-width="2.5" fill="none"/>
                            <path d="M18 38 Q18 44, 32 48 Q46 44, 46 38" stroke="url(#grad-ambiance-2)" stroke-width="2.5" fill="none" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="ambiance-card-title">Ambiance Conviviale</h3>
                    <p class="ambiance-card-description">Un espace chaleureux pensé pour les moments partagés, où chacun se sent bienvenu</p>
                    <div class="ambiance-card-accent"></div>
                </div>
            </div>

            {{-- Card 3: Espace Détente --}}
            <div class="ambiance-card-premium">
                <div class="ambiance-card-image">
                    <img src="{{ asset('images/ashley.webp') }}" alt="Espace détente Factory & Co - Confort et relaxation" loading="lazy">
                    <div class="ambiance-card-overlay"></div>
                </div>
                <div class="ambiance-card-content">
                    <div class="ambiance-card-icon">
                        <svg viewBox="0 0 64 64" fill="none">
                            <defs>
                                <linearGradient id="grad-ambiance-3" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#F5C3DB;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#CC3366;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <rect x="14" y="20" width="36" height="24" rx="3" stroke="url(#grad-ambiance-3)" stroke-width="2.5" fill="none"/>
                            <path d="M20 32 Q20 28, 24 28" stroke="url(#grad-ambiance-3)" stroke-width="2" fill="none" stroke-linecap="round"/>
                            <path d="M44 32 Q44 28, 40 28" stroke="url(#grad-ambiance-3)" stroke-width="2" fill="none" stroke-linecap="round"/>
                            <path d="M26 40 L 26 45 M 38 40 L 38 45" stroke="url(#grad-ambiance-3)" stroke-width="2.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="ambiance-card-title">Espace Détente</h3>
                    <p class="ambiance-card-description">Que ce soit rapide ou détente, nos installations vous offrent le confort et la sérénité</p>
                    <div class="ambiance-card-accent"></div>
                </div>
            </div>
        </div>

        {{-- Ambiance Message --}}
        <div class="ambiance-message">
            <blockquote class="ambiance-tagline">
                L'ambiance n'est pas une décoration.<br>
                <span class="ambiance-tagline-emphasis">C'est l'âme du lieu.</span>
            </blockquote>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : MOMENTS
════════════════════════════════════════════ --}}
<section class="section section-light">
    <div class="container">
        <h2 class="concept-title">⏰ Pour Tous les Moments</h2>
        <p class="section-subtitle">Du déjeuner au goûter… jusqu'au dîner</p>

        <div class="moments-grid">
            <div class="moment-card">
                <span class="moment-icon">🍽️</span>
                <h4>Pause déjeuner efficace</h4>
                <p>Rapide, satisfaisante et délicieuse</p>
            </div>
            <div class="moment-card">
                <span class="moment-icon">☕</span>
                <h4>Goûter gourmand</h4>
                <p>Pour une pause sucrée réconfortante</p>
            </div>
            <div class="moment-card">
                <span class="moment-icon">🌆</span>
                <h4>Dîner décontracté</h4>
                <p>Entre détente et plaisir gustatif</p>
            </div>
            <div class="moment-card">
                <span class="moment-icon">👫</span>
                <h4>Moment entre amis</h4>
                <p>À partager en bonne compagnie</p>
            </div>
        </div>

        <p style="text-align: center; margin-top: 2rem; font-style: italic; color: var(--pink-dark);">
            Peu importe l'heure, il y a toujours une bonne raison de venir.
        </p>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : CE QUE NOS CLIENTS AIMENT
════════════════════════════════════════════ --}}
<section class="section section-dark">
    <div class="container">
        <h2 class="concept-title light">❤️ Ce que Nos Clients Aiment</h2>
        <p class="text-light-muted" style="text-align: center; font-size: 1.1rem; margin-bottom: 2rem;">Une expérience qui marque</p>

        <div class="testimonial-section">
            <p class="text-light-muted" style="margin-bottom: 2rem; text-align: center; font-size: 1.05rem;">
                Nos clients reviennent pour :
            </p>

            <div class="love-grid">
                <div class="love-item">
                    <h4 style="color: var(--pink);">La générosité</h4>
                    <p>Des plats copieux et réconfortants</p>
                </div>
                <div class="love-item">
                    <h4 style="color: var(--pink);">La qualité</h4>
                    <p>Des produits choisis avec soin</p>
                </div>
                <div class="love-item">
                    <h4 style="color: var(--pink);">L'ambiance</h4>
                    <p>Un lieu agréable et accueillant</p>
                </div>
                <div class="love-item">
                    <h4 style="color: var(--pink);">Le plaisir</h4>
                    <p>Simple de bien manger</p>
                </div>
            </div>

            <p class="text-light-muted" style="text-align: center; margin-top: 2rem; font-style: italic;">
                Un lieu qui plaît, et qui donne envie de revenir.
            </p>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : LOCALISATION
════════════════════════════════════════════ --}}
<section class="section section-light">
    <div class="container">
        <h2 class="concept-title">📍 Au Cœur de Votre Centre Commercial</h2>
        <p class="section-subtitle">Facile, accessible, évident</p>

        <div class="location-content">
            <p style="margin-bottom: 2rem; font-size: 1.05rem; text-align: center;">
                Idéalement situé, notre restaurant est le point de pause parfait.
            </p>

            <div class="location-list">
                <div class="location-item">
                    <span>🎯</span>
                    <p>Au milieu de votre parcours shopping</p>
                </div>
                <div class="location-item">
                    <span>⚡</span>
                    <p>Accessible rapidement</p>
                </div>
                <div class="location-item">
                    <span>🔄</span>
                    <p>Adapté à tous les rythmes</p>
                </div>
            </div>

            <p style="text-align: center; margin-top: 2rem; font-style: italic; color: var(--pink-dark);">
                Un lieu pratique, sans compromis sur l'expérience.
            </p>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     CTA FINAL - EXPÉRIENCE À VIVRE
════════════════════════════════════════════ --}}
<section class="section-cta-final">
    <div class="section-cta-bg"></div>
    <div class="container">
        <div class="cta-inner">
            {{-- Badge ── --}}
            <span class="cta-badge">✨ Expérience à vivre</span>

            {{-- Titre principal ── --}}
            <h2 class="cta-title">
                Prêt à découvrir<br>
                <span class="cta-highlight">l'authentique expérience ?</span>
            </h2>

            {{-- Description ── --}}
            <p class="cta-description">
                Bien plus qu'un restaurant, Factory & Co est une parenthèse gourmande<br>
                et mémorable au cœur de votre centre commercial.
            </p>

            {{-- CTA Buttons ── --}}
            <div class="cta-buttons">
                <a href="{{ route('menu.burgers') }}" class="btn btn-pink cta-btn-primary">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m0 0h6" />
                    </svg>
                    Voir la carte
                </a>
                <a href="javascript:void(0)" onclick="window.factoryCoNav && window.factoryCoNav.openNavigationModal()" class="btn btn-outline-white cta-btn-secondary">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Venir chez nous
                </a>
            </div>

            {{-- Accent line ── --}}
            <div class="cta-accent"></div>

            {{-- Tagline finale ── --}}
            <p class="cta-tagline">
                ✓ Factory & Co Depuis 2008<br>
                <span class="cta-tagline-small">Une vraie différence. Un vrai plaisir.</span>
            </p>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const slider = document.getElementById('cuisine-slider');
  const prevBtn = document.getElementById('slider-prev');
  const nextBtn = document.getElementById('slider-next');

  if (!slider || !prevBtn || !nextBtn) return;

  const scrollAmount = 340; // Card width + gap

  prevBtn.addEventListener('click', function() {
    slider.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
  });

  nextBtn.addEventListener('click', function() {
    slider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
  });

  // Optional: Disable buttons at start/end
  function updateButtonStates() {
    prevBtn.disabled = slider.scrollLeft <= 0;
    nextBtn.disabled = slider.scrollLeft >= slider.scrollWidth - slider.clientWidth - 10;

    prevBtn.style.opacity = prevBtn.disabled ? '0.4' : '1';
    nextBtn.style.opacity = nextBtn.disabled ? '0.4' : '1';
  }

  slider.addEventListener('scroll', updateButtonStates);
  updateButtonStates();
});
</script>

@endsection
