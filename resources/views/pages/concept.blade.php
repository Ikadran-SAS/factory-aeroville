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
                'name' => 'Notre concept',
                'item' => route('concept')
            ]
        ]
    ];

    $webPageSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebPage',
        '@id' => route('concept') . '#webpage',
        'url' => route('concept'),
        'name' => 'Notre Concept – Factory & Co Aéroville',
        'description' => 'Découvrez l\'univers de Factory & Co : une philosophie basée sur l\'authenticité, la passion et le savoir-faire artisanal.',
        'isPartOf' => [
            '@id' => route('home') . '#website'
        ],
        'inLanguage' => 'fr-FR',
        'breadcrumb' => [
            '@id' => route('concept') . '#breadcrumb'
        ]
    ];

    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => [
            [
                '@type' => 'Question',
                'name' => 'Quel est le concept de Factory & Co ?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Factory & Co propose une expérience de cuisine gourmande et qualitative, inspirée des diners new-yorkais, avec burgers smashés, bagels frais et desserts artisanaux. Nous alions rapidité et qualité premium.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Depuis quand existe Factory & Co ?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Factory & Co existe depuis 1989. Nous sommes implantés à Aéroville depuis 2013, au cœur du centre commercial.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Quels sont les horaires d\'ouverture ?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Nous sommes ouverts 7 jours sur 7. Lun-Jeu, Dim: 8h30-22h. Ven-Sam: 8h30-23h.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Proposez-vous des options végétariennes et halal ?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Oui, Factory & Co propose des options pour tous : menus végétariens et halal disponibles pour accompagner tous nos clients.'
                ]
            ]
        ]
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($webPageSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')
<nav class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Accueil</a><span class="bc-sep">›</span><span>Notre concept</span></div></nav>

{{-- ════════════════════════════════════════════
     HERO SECTION
════════════════════════════════════════════ --}}
<section class="hero hero-concept">
    <div class="hero-bg" style="background-image:url('{{ asset('images/factory-aeroville-hero.webp') }}')" aria-hidden="true"></div>
    <div class="hero-concept-overlay"></div>
    <div class="hero-content">
        <span class="section-tag">Le concept</span>
        <h1>Le diner new-yorkais qui ne fait rien comme les autres.</h1>
        <p>Brooklyn s'installe au cœur d'Aéroville. Montez à bord.</p>
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
                    Ce qui nous anime
                </span>

                {{-- Titre principal avec highlight --}}
                <h2 class="pitch-redesigned-title">
                    Ici, on ne fait pas<br>
                    <span class="pitch-highlight">de la restauration rapide.</span>
                </h2>

                {{-- Accent line --}}
                <div class="pitch-accent-line"></div>

                {{-- Lead --}}
                <p class="pitch-redesigned-lead">
                    On crée des moments : <span class="pitch-emphasis">savoureux, sincères, addictifs.</span>
                </p>

                {{-- Description --}}
                <p class="pitch-redesigned-description">
                    Des burgers smashés à la seconde, des cheesecakes qui fondent avant d'arriver à table, une énergie contagieuse dans l'air. Pas besoin de traverser l'Atlantique pour retrouver l'âme des diners américains.
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
                    <img src="{{ asset('images/factory-aeroville-hero.webp') }}" alt="Intérieur Factory & Co - Atmosphère du diner" loading="lazy">
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
                Notre <span class="concept-highlight">ADN</span>
            </h2>
            <p class="concept-subtitle-redesigned">Né à Brooklyn, grandi en France</p>
        </div>

        {{-- Intro text en citation --}}
        <blockquote class="concept-quote">
            Tout part d'une conviction : on peut manger vite et manger bien. Notre carte réunit le meilleur du fast-casual américain, revisité avec l'exigence française.
        </blockquote>

        {{-- 3 Piliers en cards --}}
        <div class="concept-pillars-grid">
            {{-- Pilier 1 --}}
            <div class="concept-pillar-card">
                <div class="pillar-content">
                    <h3 class="pillar-title">Vite fait,<br>bien fait</h3>
                    <p class="pillar-description">
                        Votre commande est lancée devant vous. Smashé, garni, servi : tout est frais, rien n'attend sous une lampe.
                    </p>
                </div>
                <div class="pillar-accent-bar"></div>
            </div>

            {{-- Pilier 2 --}}
            <div class="concept-pillar-card">
                <div class="pillar-content">
                    <h3 class="pillar-title">Du comptoir<br>au voyage</h3>
                    <p class="pillar-description">
                        Néons, briques, musique : dès que vous poussez la porte, vous êtes ailleurs. Le décor raconte une histoire, votre assiette aussi.
                    </p>
                </div>
                <div class="pillar-accent-bar"></div>
            </div>

            {{-- Pilier 3 --}}
            <div class="concept-pillar-card">
                <div class="pillar-content">
                    <h3 class="pillar-title">Pensé<br>pour tous</h3>
                    <p class="pillar-description">
                        Familles, amis, solo pressés ou voyageurs en transit depuis CDG : chacun trouve sa place et son moment chez nous.
                    </p>
                </div>
                <div class="pillar-accent-bar"></div>
            </div>
        </div>

        {{-- Conclusion impactante --}}
        <div class="concept-conclusion">
            <p class="concept-conclusion-text">
                Un état d'esprit simple : des produits qu'on assume, une cuisine qu'on maîtrise, <span class="concept-conclusion-highlight">un accueil qu'on soigne</span>.
            </p>
            <p class="concept-conclusion-subtext">
                ✓ Factory & Co — Présent à Aéroville depuis 2013
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
                Votre <span class="experience-highlight">moment</span>
            </h2>
            <p class="experience-subtitle-redesigned">À votre rythme, à votre façon</p>
        </div>

        {{-- Intro text en citation premium --}}
        <blockquote class="experience-intro-quote">
            Avant le Pathé, entre deux boutiques ou juste avant de filer vers CDG, Factory & Co s'adapte à votre emploi du temps, pas l'inverse.
        </blockquote>

        {{-- 4 Moments/Expériences en grille 2x2 premium --}}
        <div class="experience-moments-grid">
            {{-- Moment 1: Prendre le temps --}}
            <div class="experience-moment-card">
                <div class="moment-content">
                    <h3 class="moment-title">S'installer</h3>
                    <p class="moment-description">Prendre une vraie pause dans votre journée</p>
                </div>
                <div class="moment-accent"></div>
            </div>

            {{-- Moment 2: Manger rapidement --}}
            <div class="experience-moment-card">
                <div class="moment-content">
                    <h3 class="moment-title">Repartir vite</h3>
                    <p class="moment-description">Commande prête en quelques minutes</p>
                </div>
                <div class="moment-accent"></div>
            </div>

            {{-- Moment 3: Partager un moment --}}
            <div class="experience-moment-card">
                <div class="moment-content">
                    <h3 class="moment-title">Venir à plusieurs</h3>
                    <p class="moment-description">Tables familiales, ambiance détendue</p>
                </div>
                <div class="moment-accent"></div>
            </div>

            {{-- Moment 4: S'offrir une pause --}}
            <div class="experience-moment-card">
                <div class="moment-content">
                    <h3 class="moment-title">Se faire plaisir</h3>
                    <p class="moment-description">Un cheesecake, un milkshake, juste pour le fun</p>
                </div>
                <div class="moment-accent"></div>
            </div>
        </div>

        {{-- Conclusion impactante --}}
        <div class="experience-conclusion">
            <p class="experience-conclusion-text">
                Pas de chichis, pas d'attente inutile. <span class="experience-conclusion-highlight">Juste l'essentiel, bien fait.</span>
            </p>
            <p class="experience-conclusion-subtext">
                ✓ Ouvert 7j/7 au CC Westfield Aéroville
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
                Notre cuisine
            </span>
            <h2 class="cuisine-title-redesigned">
                Franche, <span class="cuisine-highlight">généreuse,</span> sans filtre
            </h2>
            <p class="cuisine-subtitle-redesigned">
                Ce qu'on met dans l'assiette, on l'assume
            </p>
        </div>

        {{-- Intro text avec accent --}}
        <blockquote class="cuisine-intro-quote">
            Viande Halal certifiée, pain brioché doré à point, sauces maison, cheesecakes coulants : chaque recette a été testée, ajustée, validée. On ne triche pas sur les ingrédients et ça se sent dès la première bouchée.
        </blockquote>
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
                Ce qui fait la différence
            </span>
            <h2 class="why-choose-title">
                On ne vient pas <span class="why-choose-highlight">ici par hasard</span>
            </h2>
            <p class="why-choose-subtitle">On y revient parce que c'est bon, simple et vrai</p>
        </div>

        {{-- CARD 1: Identité Forte --}}
        <div class="why-choose-card-visual">
            <div class="card-visual-image">
                <img src="{{ asset('images/factory-aeroville-hero.webp') }}" alt="Intérieur Factory & Co Aéroville - Design unique et mémorable" loading="lazy">
                <div class="card-visual-overlay-dark"></div>
            </div>
            <div class="card-visual-content">
                <div class="card-visual-counter">01</div>
                <h3 class="card-visual-title">Un lieu qui se remarque</h3>
                <p class="card-visual-description">Néons, briques apparentes, énergie new-yorkaise : l'ambiance Factory & Co ne ressemble à rien d'autre</p>
                <div class="card-visual-accent"></div>
            </div>
        </div>

        {{-- CARD 2: Ambiance Immersive --}}
        <div class="why-choose-card-visual card-visual-reverse">
            <div class="card-visual-image">
                <img src="{{ asset('menu/SAL%C3%89/BURGER/Smash%20Burgers/Spicy%20Smash/Spicy%20Smash%20Big/DSC03815.jpg') }}" alt="Spicy Smash Burger Factory & Co" loading="lazy">
                <div class="card-visual-overlay-dark"></div>
            </div>
            <div class="card-visual-content">
                <div class="card-visual-counter">02</div>
                <h3 class="card-visual-title">Une énergie communicative</h3>
                <p class="card-visual-description">La playlist, l'équipe, les odeurs de grill : tout contribue à créer une atmosphère unique</p>
                <div class="card-visual-accent"></div>
            </div>
        </div>

        {{-- CARD 3: Cuisine Généreuse --}}
        <div class="why-choose-card-visual">
            <div class="card-visual-image">
                <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/X/DSC00466.jpg') }}" alt="Desserts gourmands Factory & Co" loading="lazy">
                <div class="card-visual-overlay-dark"></div>
            </div>
            <div class="card-visual-content">
                <div class="card-visual-counter">03</div>
                <h3 class="card-visual-title">Des portions honnêtes</h3>
                <p class="card-visual-description">Ce qui est dans la vitrine, c'est ce que vous retrouvez dans l'assiette. En vrai.</p>
                <div class="card-visual-accent"></div>
            </div>
        </div>

        {{-- CARD 4: Expérience Complète --}}
        <div class="why-choose-card-visual card-visual-reverse">
            <div class="card-visual-image">
                <img src="{{ asset('menu/SUCR%C3%89/BREAKFAST/DSC01094.jpg') }}" alt="Breakfast Factory & Co - Moments en famille" loading="lazy">
                <div class="card-visual-overlay-dark"></div>
            </div>
            <div class="card-visual-content">
                <div class="card-visual-counter">04</div>
                <h3 class="card-visual-title">Du breakfast au dessert</h3>
                <p class="card-visual-description">Dès 8h30, du petit-déjeuner au cheesecake de fin de soirée, on couvre tous les moments</p>
                <div class="card-visual-accent"></div>
            </div>
        </div>

        {{-- Conclusion Impactante --}}
        <div class="why-choose-conclusion-visual">
            <blockquote class="conclusion-quote">
                <span class="quote-mark">"</span>
                <p>On ne vient pas juste manger.</p>
                <p class="conclusion-highlight">On vient se régaler.</p>
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
                L'atmosphère
            </span>
            <h2 class="ambiance-title-redesigned">
                Un décor qui <span class="ambiance-highlight">raconte quelque chose</span>
            </h2>
            <p class="ambiance-subtitle-redesigned">On entre, on oublie qu'on est dans un centre commercial</p>
        </div>

        {{-- Intro Quote --}}
        <blockquote class="ambiance-intro-quote">
            Les néons s'allument, la musique pulse, l'odeur du grill flotte dans l'air. Factory & Co, c'est un voyage express à Brooklyn sans quitter Aéroville.
        </blockquote>

        {{-- 3 Premium Ambiance Cards avec images --}}
        <div class="ambiance-cards-grid">
            {{-- Card 1: Design Urbain --}}
            <div class="ambiance-card-premium">
                <div class="ambiance-card-image">
                    <img src="{{ asset('images/factory-aeroville-hero.webp') }}" alt="Design urbain Factory & Co - Intérieur moderne et inspiré" loading="lazy">
                    <div class="ambiance-card-overlay"></div>
                </div>
                <div class="ambiance-card-content">
                    <h3 class="ambiance-card-title">Esprit Brooklyn</h3>
                    <p class="ambiance-card-description">Briques, métal, bois brut et néons : chaque matière raconte l'histoire des diners américains</p>
                    <div class="ambiance-card-accent"></div>
                </div>
            </div>

            {{-- Card 2: Ambiance Conviviale --}}
            <div class="ambiance-card-premium">
                <div class="ambiance-card-image">
                    <img src="{{ asset('images/factory-aeroville-hero.webp') }}" alt="Ambiance conviviale Factory & Co - Moments en famille" loading="lazy">
                    <div class="ambiance-card-overlay"></div>
                </div>
                <div class="ambiance-card-content">
                    <h3 class="ambiance-card-title">Ouvert à tous</h3>
                    <p class="ambiance-card-description">Familles, couples, bandes de potes, voyageurs solo : tout le monde est chez soi ici</p>
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
                    <h3 class="ambiance-card-title">Confort pensé</h3>
                    <p class="ambiance-card-description">Banquettes, assises variées, espace kids : installez-vous comme vous voulez</p>
                    <div class="ambiance-card-accent"></div>
                </div>
            </div>
        </div>

        {{-- Ambiance Message --}}
        <div class="ambiance-message">
            <blockquote class="ambiance-tagline">
                Le décor n'est pas un accessoire.<br>
                <span class="ambiance-tagline-emphasis">C'est ce qui fait qu'on revient.</span>
            </blockquote>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : POUR TOUS LES MOMENTS (REDESIGNÉE)
════════════════════════════════════════════ --}}
<section class="section moments-section-redesigned">
    <div class="container">
        {{-- Header Premium --}}
        <div class="moments-header-redesigned">
            <span class="moments-badge">
                À toute heure
            </span>
            <h2 class="moments-title-redesigned">
                Il y a toujours une <span class="moments-highlight">raison de passer</span>
            </h2>
            <p class="moments-subtitle-redesigned">8h30, 12h, 16h, 20h : la carte s'adapte à votre journée</p>
        </div>

        {{-- Intro Quote --}}
        <blockquote class="moments-intro-quote">
            Shopping marathon, escale avant un vol, sortie ciné au Pathé ou simple envie de bien manger : chez nous, il n'y a pas de mauvais moment pour venir.
        </blockquote>

        {{-- 4 Premium Moments Cards — Du matin au soir --}}
        <div class="moments-cards-grid">
            {{-- Card 1: Petit-déjeuner --}}
            <div class="moments-card-premium">
                <div class="moments-card-image">
                    <img src="{{ asset('menu/SUCR%C3%89/BREAKFAST/DSC01073.jpg') }}" alt="Petit-déjeuner américain Factory & Co" loading="lazy">
                    <div class="moments-card-overlay"></div>
                </div>
                <div class="moments-card-content">
                    <div class="moments-card-number">01</div>
                    <h3 class="moments-card-title">Breakfast dès 8h30</h3>
                    <p class="moments-card-description">Bagels frais, pancakes, viennoiseries et café de spécialité pour démarrer la journée du bon pied</p>
                    <div class="moments-card-accent"></div>
                </div>
            </div>

            {{-- Card 2: Pause déjeuner --}}
            <div class="moments-card-premium">
                <div class="moments-card-image">
                    <img src="{{ asset('menu/SAL%C3%89/BURGER/Smash%20Burgers/Cheeseburger/Cheeseburger%20Regular/DSC03883.jpg') }}" alt="Pause déjeuner Factory & Co" loading="lazy">
                    <div class="moments-card-overlay"></div>
                </div>
                <div class="moments-card-content">
                    <div class="moments-card-number">02</div>
                    <h3 class="moments-card-title">Midi express</h3>
                    <p class="moments-card-description">Un smash burger ou un bagel entre deux boutiques. Commandé, préparé, savouré : votre pause déjeuner est bouclée</p>
                    <div class="moments-card-accent"></div>
                </div>
            </div>

            {{-- Card 3: Goûter gourmand --}}
            <div class="moments-card-premium">
                <div class="moments-card-image">
                    <img src="{{ asset('menu/SUCR%C3%89/CHEESECAKE/Factory_Claye%204.JPG') }}" alt="Goûter gourmand Factory & Co" loading="lazy">
                    <div class="moments-card-overlay"></div>
                </div>
                <div class="moments-card-content">
                    <div class="moments-card-number">03</div>
                    <h3 class="moments-card-title">Pause sucrée</h3>
                    <p class="moments-card-description">Cheesecake, milkshake, cookie : la parenthèse gourmande parfaite en milieu d'après-midi</p>
                    <div class="moments-card-accent"></div>
                </div>
            </div>

            {{-- Card 4: Dîner décontracté --}}
            <div class="moments-card-premium">
                <div class="moments-card-image">
                    <img src="{{ asset('images/factory-aeroville-hero.webp') }}" alt="Dîner décontracté Factory & Co Aéroville" loading="lazy">
                    <div class="moments-card-overlay"></div>
                </div>
                <div class="moments-card-content">
                    <div class="moments-card-number">04</div>
                    <h3 class="moments-card-title">Soirée tranquille</h3>
                    <p class="moments-card-description">Après le Pathé ou en fin de shopping, posez-vous pour un burger et un dessert avant de rentrer</p>
                    <div class="moments-card-accent"></div>
                </div>
            </div>
        </div>

        {{-- Closing Message --}}
        <div class="moments-closing-message">
            <p class="moments-closing-text">
                De l'ouverture à la fermeture, la carte tourne mais la qualité reste.<br>
                <span class="moments-closing-emphasis">Factory & Co Aéroville, ouvert 7j/7.</span>
            </p>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : AVIS CLIENTS (VRAIS AVIS GOOGLE)
════════════════════════════════════════════ --}}
<section class="section section-dark" id="avis">
    <div class="container">
        <div class="reviews-header-section">
            <h2 class="section-title light">Ce que nos clients<br><em>en pensent</em></h2>
            <div class="reviews-rating">
                <div class="reviews-stars">@for($i = 1; $i <= 5; $i++)★@endfor</div>
                <div class="reviews-score">{{ number_format($averageRating, 1, ',', '') }} <span>/5 · {{ $totalReviews }} avis Google</span></div>
            </div>
        </div>

        <div class="reviews-grid-clean">
            @foreach($featuredReviews as $review)
                <div class="review-card-clean">
                    <div class="review-card-header-clean">
                        <div class="review-avatar-clean">{{ $review->author_initial ?? strtoupper(substr($review->author_name, 0, 1)) }}</div>
                        <div class="review-info-clean">
                            <h3>{{ $review->author_name }}</h3>
                            <p class="review-time">{{ $review->date_label }}</p>
                        </div>
                        <svg class="google-logo-clean" viewBox="0 0 24 24" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"></path><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path></svg>
                    </div>
                    <div class="review-stars-clean">
                        @for ($i = 1; $i <= 5; $i++)
                            <span>@if($i <= $review->rating)★@else☆@endif</span>
                        @endfor
                    </div>
                    <p class="review-text-clean">{{ $review->content }}</p>
                </div>
            @endforeach
        </div>

        <div class="text-center" style="margin-top: 2rem;">
            <a href="{{ route('avis') }}" class="btn btn-outline-white">Voir tous les avis</a>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : LOCALISATION (REDESIGNÉE)
════════════════════════════════════════════ --}}
<section class="section location-section-redesigned">
    <div class="container">
        {{-- Header Premium --}}
        <div class="location-header">
            <span class="location-badge">
                Au cœur de votre centre commercial
            </span>
            <h2 class="location-title">
                Facile, <span class="location-highlight">accessible,</span> évident
            </h2>
            <p class="location-subtitle">Le point de pause parfait dans votre journée</p>
        </div>

        {{-- Intro Text --}}
        <p class="location-intro">
            Idéalement situé au cœur de votre centre commercial, Factory & Co est toujours à portée de main pour vos moments de détente.
        </p>

        {{-- 3 Premium Location Benefit Cards --}}
        <div class="location-benefits-grid">
            {{-- Card 1: Localisation --}}
            <div class="location-benefit-card">
                <h3 class="location-benefit-title">Au milieu du shopping</h3>
                <p class="location-benefit-text">Situé stratégiquement pour une pause naturelle dans votre parcours</p>
            </div>

            {{-- Card 2: Accessibilité --}}
            <div class="location-benefit-card">
                <h3 class="location-benefit-title">Accessible rapidement</h3>
                <p class="location-benefit-text">Facile à trouver, entièrement accessible de tous les sens du centre</p>
            </div>

            {{-- Card 3: Flexibilité --}}
            <div class="location-benefit-card">
                <h3 class="location-benefit-title">Adapté à tous les rythmes</h3>
                <p class="location-benefit-text">Ouvert à tous les moments, du matin jusqu'au soir, 7 jours sur 7</p>
            </div>
        </div>

        {{-- Closing Message --}}
        <div class="location-closing">
            <p class="location-closing-text">
                Un lieu pratique, sans aucun compromis sur l'expérience et la qualité.
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
            <span class="cta-badge">Expérience à vivre</span>

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
                <a href="{{ route('menu.index') }}" class="btn btn-pink cta-btn-primary">
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
                ✓ Factory & Co Depuis 1989<br>
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
