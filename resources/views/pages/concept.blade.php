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

        {{-- Grille 4 Catégories (2x2) avec cartes animées --}}
        <div class="cuisine-categories-grid">
            {{-- Catégorie 1: Burgers --}}
            <div class="cuisine-category-card">
                <div class="category-image">
                    <img src="/images/burger.webp" alt="Délicieux burger gourmand" />
                </div>
                <div class="category-emoji-wrapper">
                    <span class="category-emoji">🍔</span>
                </div>
                <div class="category-content">
                    <h3 class="category-title">Burgers</h3>
                    <p class="category-description">
                        Généreux au pain moelleux
                    </p>
                    <div class="category-accent-line"></div>
                </div>
                <div class="category-accent-bar"></div>
            </div>

            {{-- Catégorie 2: Recettes --}}
            <div class="cuisine-category-card">
                <div class="category-image">
                    <img src="/images/recettes.webp" alt="Recettes travaillées et savoureuses" />
                </div>
                <div class="category-emoji-wrapper">
                    <span class="category-emoji">🍽️</span>
                </div>
                <div class="category-content">
                    <h3 class="category-title">Recettes</h3>
                    <p class="category-description">
                        Travaillées et savoureuses
                    </p>
                    <div class="category-accent-line"></div>
                </div>
                <div class="category-accent-bar"></div>
            </div>

            {{-- Catégorie 3: Desserts --}}
            <div class="cuisine-category-card">
                <div class="category-image">
                    <img src="/images/desserts.webp" alt="Desserts iconiques et régressifs" />
                </div>
                <div class="category-emoji-wrapper">
                    <span class="category-emoji">🍰</span>
                </div>
                <div class="category-content">
                    <h3 class="category-title">Desserts</h3>
                    <p class="category-description">
                        Iconiques et régressifs
                    </p>
                    <div class="category-accent-line"></div>
                </div>
                <div class="category-accent-bar"></div>
            </div>

            {{-- Catégorie 4: Boissons --}}
            <div class="cuisine-category-card">
                <div class="category-image">
                    <img src="/images/boissons.webp" alt="Boissons gourmandes et rafraîchissantes" />
                </div>
                <div class="category-emoji-wrapper">
                    <span class="category-emoji">🥤</span>
                </div>
                <div class="category-content">
                    <h3 class="category-title">Boissons</h3>
                    <p class="category-description">
                        Gourmandes et rafraîchissantes
                    </p>
                    <div class="category-accent-line"></div>
                </div>
                <div class="category-accent-bar"></div>
            </div>
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
     SECTION : POURQUOI NOUS CHOISIR
════════════════════════════════════════════ --}}
<section class="section section-light">
    <div class="container">
        <h2 class="concept-title">💥 Pourquoi Nous Choisir</h2>
        <p class="section-subtitle">Une vraie alternative aux chaînes classiques</p>

        <div class="concept-content">
            <p style="margin-bottom: 2rem; font-size: 1.05rem; text-align: center;">
                Nous ne sommes pas un fast-food comme les autres.
            </p>

            <div class="why-grid">
                <div class="why-item">
                    <h4>Identité forte</h4>
                    <p>Reconnaissable et mémorable</p>
                </div>
                <div class="why-item">
                    <h4>Ambiance immersive</h4>
                    <p>Qui captive dès l'entrée</p>
                </div>
                <div class="why-item">
                    <h4>Cuisine généreuse</h4>
                    <p>Qualitative et satisfaisante</p>
                </div>
                <div class="why-item">
                    <h4>Expérience complète</h4>
                    <p>Repas + dessert + moment</p>
                </div>
            </div>

            <p style="text-align: center; margin-top: 2rem; font-style: italic; color: var(--pink-dark); font-size: 1.1rem;">
                Ici, vous ne consommez pas.<br>Vous vivez une expérience.
            </p>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : L'AMBIANCE
════════════════════════════════════════════ --}}
<section class="section section-dark">
    <div class="container">
        <h2 class="concept-title light">🏙️ L'Ambiance du Lieu</h2>
        <p class="text-light-muted" style="text-align: center; font-size: 1.1rem; margin-bottom: 2rem;">Un lieu vivant, chaleureux et moderne</p>

        <div class="ambiance-content">
            <p class="text-light-muted" style="margin-bottom: 2rem; font-size: 1.05rem; text-align: center;">
                Dès l'entrée, l'atmosphère se fait ressentir.
            </p>

            <div class="ambiance-list">
                <div class="ambiance-item">
                    <span class="ambiance-icon">🎨</span>
                    <h4>Design urbain</h4>
                    <p>Inspiré des grandes villes</p>
                </div>
                <div class="ambiance-item">
                    <span class="ambiance-icon">👥</span>
                    <h4>Ambiance conviviale</h4>
                    <p>Pensée pour se retrouver</p>
                </div>
                <div class="ambiance-item">
                    <span class="ambiance-icon">✨</span>
                    <h4>Espace détente</h4>
                    <p>Qui invite à profiter</p>
                </div>
            </div>

            <p class="text-light-muted" style="text-align: center; margin-top: 2rem; font-style: italic;">
                Que ce soit pour une pause rapide ou un moment plus long, l'espace invite à se détendre et à profiter.
            </p>
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

@endsection
