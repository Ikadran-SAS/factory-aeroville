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
                'name' => 'Nos Spécialités',
                'item' => route('specialites')
            ]
        ]
    ];

    $webPageSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebPage',
        '@id' => route('specialites'),
        'url' => route('specialites'),
        'name' => 'Nos Spécialités – Factory & Co Aéroville',
        'description' => 'Smash burgers Halal, bagels façon Brooklyn, cheesecakes maison et breakfast dès 8h30 au CC Westfield Aéroville, Tremblay-en-France, près de CDG et du Pathé.',
        'isPartOf' => [
            '@type' => 'WebSite',
            '@id' => route('home')
        ],
        'breadcrumb' => [
            '@id' => '#breadcrumb'
        ]
    ];

    $specialitesSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'item' => [
                    '@type' => 'Product',
                    'name' => 'Smash Burgers',
                    'description' => 'Viande Halal certifiée, smashée sur plaque brûlante. Cheddar fondant, brioche dorée. Le vrai smash burger, au cœur d\'Aéroville.',
                    'brand' => [
                        '@type' => 'Brand',
                        'name' => 'Factory & Co'
                    ]
                ]
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'item' => [
                    '@type' => 'Product',
                    'name' => 'Bagels Authentiques',
                    'description' => 'Recette authentique Brooklyn : bouillis puis dorés au four. Garnis frais chaque matin, à déguster au CC Westfield Aéroville.',
                    'brand' => [
                        '@type' => 'Brand',
                        'name' => 'Factory & Co'
                    ]
                ]
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'item' => [
                    '@type' => 'Product',
                    'name' => 'Cheesecake Factory',
                    'description' => 'Recette crémeuse à l\'américaine, base biscuitée croustillante. Préparé chaque jour dans notre restaurant d\'Aéroville.',
                    'brand' => [
                        '@type' => 'Brand',
                        'name' => 'Factory & Co'
                    ]
                ]
            ],
            [
                '@type' => 'ListItem',
                'position' => 4,
                'item' => [
                    '@type' => 'Product',
                    'name' => 'Breakfast Américain',
                    'description' => 'Dès 8h30 à Aéroville : bagels du jour, pancakes, viennoiseries et cafés de spécialité. Le breakfast qui vaut le détour.',
                    'brand' => [
                        '@type' => 'Brand',
                        'name' => 'Factory & Co'
                    ]
                ]
            ]
        ]
    ];

    // Build FAQ schema from $faqs
    $faqItems = [];
    if (!empty($faqs)) {
        foreach ($faqs as $index => $faq) {
            $faqItems[] = [
                '@type' => 'Question',
                'position' => $index + 1,
                'name' => $faq['question'] ?? '',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer'] ?? ''
                ]
            ];
        }
    }

    $faqSchema = null;
    if (!empty($faqItems)) {
        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faqItems
        ];
    }
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($webPageSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($specialitesSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@if($faqSchema)
<script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endif
@endpush

@section('content')

{{-- ════════════════════════════════════════════
     BREADCRUMB
════════════════════════════════════════════ --}}
<nav class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Accueil</a><span class="bc-sep">›</span><span>Nos Spécialités</span></div></nav>

{{-- ════════════════════════════════════════════
     HERO SECTION
════════════════════════════════════════════ --}}
<section class="hero hero-specialites">
    <div class="hero-bg" style="background-image: url('https://restaurants.factoryandco.com/wp-content/uploads/2020/07/smash-burger.webp')" aria-hidden="true"></div>
    <div class="hero-overlay" aria-hidden="true"></div>
    <div class="hero-content">
        <span class="section-tag">🌟 Nos spécialités</span>
        <h1>Nos spécialités<br><em>Quatre raisons de revenir</em></h1>
        <p class="hero-sub">Smash burgers, bagels, cheesecakes et breakfast : tout ce qui fait la réputation de Factory & Co à Aéroville</p>
        <div class="hero-ctas">
            <a href="{{ route('menu.index') }}" class="btn btn-pink">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Découvrir la carte
            </a>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION INTRO - La Philosophie
════════════════════════════════════════════ --}}
<section class="section section-light">
    <div class="container">
        <div class="concept-grid">
            <div class="concept-text">
                <span class="section-tag dark">Ce qu'on sait faire</span>
                <h2 class="section-title dark">
                    Quatre spécialités<br>
                    <em>une seule exigence</em>
                </h2>
                <p>Chez Factory &amp; Co Aéroville, chaque spécialité a été pensée pour aller à l'essentiel : des produits frais, une préparation à la minute et des recettes qui ne changent pas au gré des modes.</p>
                <p>Viande Halal certifiée pour les burgers, bagels bouillis puis dorés comme à Brooklyn, cheesecakes crémeux préparés chaque jour. On ne coupe pas les coins.</p>
                <p><strong>Ce qui est dans la vitrine, c'est ce qui arrive dans l'assiette.</strong></p>
            </div>
            <div class="concept-image">
                <img src="{{ asset('images/factory-aeroville-hero.webp') }}"
                     alt="Intérieur Factory & Co Aéroville"
                     loading="lazy" width="700" height="500">
                <div class="concept-badge">
                    <span class="concept-badge-title">Premium</span>
                    <span class="concept-badge-sub">Made Daily</span>
                    <span class="concept-badge-detail">100% à la minute</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : 4 SPÉCIALITÉS EN SHOWCASE
════════════════════════════════════════════ --}}
<section class="section section-dark">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag">Galerie</span>
            <h2 class="section-title light">Les 4 piliers<br>qui font notre réputation</h2>
        </div>

        <div class="specialites-grid">
            {{-- SMASH BURGERS --}}
            <div class="specialite-card">
                <div class="specialite-image">
                    <img src="https://restaurants.factoryandco.com/wp-content/uploads/2020/07/smash-burger.webp" alt="Smash Burgers Factory & Co" loading="lazy">
                    <span class="specialite-badge">Signature</span>
                </div>
                <div class="specialite-content">
                    <h3>Smash Burgers</h3>
                    <p>Viande smashée sur plaque à 200°C, cheddar fondu, brioche toastée. Préparé devant vous en quelques minutes.</p>
                    <div class="specialite-meta">
                        <span>⏱️ Rapide</span>
                        <span>🔥 Gourmand</span>
                    </div>
                    <a href="{{ route('menu.index') }}" class="btn btn-pink btn-sm">
                        Découvrir
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- BAGELS --}}
            <div class="specialite-card">
                <div class="specialite-image">
                    <img src="https://restaurants.factoryandco.com/wp-content/uploads/2024/05/BLT-SEUL-2.jpg" alt="Bagels Authentiques Factory & Co" loading="lazy">
                    <span class="specialite-badge">Star</span>
                </div>
                <div class="specialite-content">
                    <h3>Bagels Authentiques</h3>
                    <p>Bouillis puis dorés au four chaque matin. Garnis de produits frais, du saumon fumé au poulet grillé. La vraie recette new-yorkaise.</p>
                    <div class="specialite-meta">
                        <span>🌅 Breakfast</span>
                        <span>✨ Artisanal</span>
                    </div>
                    <a href="{{ route('menu.index') }}" class="btn btn-pink btn-sm">
                        Découvrir
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- CHEESECAKE --}}
            <div class="specialite-card">
                <div class="specialite-image">
                    <img src="https://restaurants.factoryandco.com/wp-content/uploads/2020/07/cheesecake.webp" alt="Cheesecake Factory & Co" loading="lazy">
                    <span class="specialite-badge">Must-try</span>
                </div>
                <div class="specialite-content">
                    <h3>Cheesecake Factory</h3>
                    <p>Base biscuitée croustillante, cœur crémeux. Classique, Oreo, Kinder Bueno, Spéculoos : il y en a pour tous les gourmands.</p>
                    <div class="specialite-meta">
                        <span>🎂 Dessert</span>
                        <span>💎 Iconique</span>
                    </div>
                    <a href="{{ route('menu.index') }}" class="btn btn-pink btn-sm">
                        Découvrir
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- BREAKFAST --}}
            <div class="specialite-card">
                <div class="specialite-image">
                    <img src="https://restaurants.factoryandco.com/wp-content/uploads/2024/05/smoothiee.jpeg" alt="Breakfast Américain Factory & Co" loading="lazy">
                    <span class="specialite-badge">Premium</span>
                </div>
                <div class="specialite-content">
                    <h3>Breakfast Américain</h3>
                    <p>Dès 8h30 à Aéroville : bagels du jour, pancakes, viennoiseries et café de spécialité. Idéal avant une journée de shopping ou un vol depuis CDG.</p>
                    <div class="specialite-meta">
                        <span>☕ Matinal</span>
                        <span>🥓 Copieux</span>
                    </div>
                    <a href="{{ route('menu.index') }}" class="btn btn-pink btn-sm">
                        Découvrir
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : QUALITÉ SANS COMPROMIS - PREMIUM
════════════════════════════════════════════ --}}
<section class="quality-section">
    <div class="container">
        <div class="quality-header">
            <span class="section-tag dark">Ce qu'on garantit</span>
            <h2 class="section-title dark">La qualité<br><em>au quotidien</em></h2>
        </div>

        <div class="quality-cards-grid">
            {{-- PILIER 1: FRAÎCHEUR --}}
            <div class="quality-card quality-card-1">
                <div class="quality-icon-circle">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="quality-icon">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 6v6h4"/>
                    </svg>
                </div>
                <div class="quality-card-content">
                    <h3>Fraîcheur</h3>
                    <p class="quality-detail">Tout est lancé à la commande. Rien n'attend, rien n'est réchauffé. Ce que vous mangez vient d'être préparé.</p>
                    <span class="quality-badge">À la commande</span>
                </div>
            </div>

            {{-- PILIER 2: CRAFT --}}
            <div class="quality-card quality-card-2">
                <div class="quality-icon-circle">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="quality-icon">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M9 12h6M12 9v6"/>
                    </svg>
                </div>
                <div class="quality-card-content">
                    <h3>Craft</h3>
                    <p class="quality-detail">Des recettes rodées depuis plus de 10 ans, inspirées des meilleurs diners de Brooklyn et adaptées aux palais français.</p>
                    <span class="quality-badge">Savoir-faire</span>
                </div>
            </div>

            {{-- PILIER 3: AUTHENTICITÉ --}}
            <div class="quality-card quality-card-3">
                <div class="quality-icon-circle">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="quality-icon">
                        <path d="M12 1L3 5v7c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                    </svg>
                </div>
                <div class="quality-card-content">
                    <h3>Authenticité</h3>
                    <p class="quality-detail">Viande Halal, produits frais, sauces maison. Le goût des vrais diners américains, en plein centre d'Aéroville.</p>
                    <span class="quality-badge">New-York Heritage</span>
                </div>
            </div>
        </div>

        {{-- Trust Statement --}}
        <div class="quality-promise">
            <p>Chaque jour, même exigence. Chaque assiette, même standard.</p>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : CTA COMMANDER
════════════════════════════════════════════ --}}
<section class="section section-cta-large">
    <div class="container">
        <div class="cta-large-content">
            <img src="{{ asset('images/ashley.webp') }}" alt="Envie d'y goûter maintenant" class="cta-image">
            <div class="cta-text">
                <h2>Envie d'y goûter<br>maintenant ?</h2>
                <p>Sur place, à emporter ou en Click &amp; Collect : passez nous voir au CC Westfield Aéroville et jugez par vous-même.</p>
                <div class="cta-actions">
                    <a href="{{ route('menu.index') }}" class="btn btn-pink">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        La carte complète
                    </a>
                    <a href="javascript:void(0)" onclick="window.factoryCoNav && window.factoryCoNav.openNavigationModal()" class="btn btn-outline-dark">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        Venir chez nous
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : FAQ
════════════════════════════════════════════ --}}
<section class="section section-light" id="faq">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag dark">Questions ?</span>
            <h2 class="section-title dark">Questions fréquentes</h2>
        </div>
        {{-- Accordéon FAQs avec Vue --}}
        <div id="faq-accordion-app" data-faqs="{{ base64_encode(json_encode($faqs)) }}"></div>
        <div class="faq-cta text-center">
            <p>Vous avez d'autres questions ?</p>
            <a href="{{ route('contact') }}" class="btn btn-outline-pink">Nous contacter</a>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : NEWSLETTER
════════════════════════════════════════════ --}}
<section class="section section-dark newsletter-section">
    <div class="container">
        <div class="newsletter-content">
            <h2>Ne ratez rien</h2>
            <p>Nouveautés, offres exclusives et actus Factory &amp; Co Aéroville directement dans votre boîte mail.</p>
            <form class="newsletter-form" method="POST" action="#">
                @csrf
                <input type="email" placeholder="votre@email.com" required>
                <button type="submit" class="btn btn-pink">S'abonner</button>
            </form>
        </div>
    </div>
</section>

@endsection

<style>
{{-- Styles CSS pour la page spécialités --}}
.specialites-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.specialite-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 2px;
    overflow: hidden;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all var(--transition);
    display: flex;
    flex-direction: column;
}

.specialite-card:hover {
    background: rgba(255, 255, 255, 0.08);
    border-color: rgba(255, 255, 255, 0.2);
    transform: translateY(-4px);
}

.specialite-image {
    position: relative;
    overflow: hidden;
    aspect-ratio: 1/1;
    height: 200px;
}

.specialite-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform var(--transition);
}

.specialite-card:hover .specialite-image img {
    transform: scale(1.05);
}

.specialite-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: var(--pink);
    color: var(--navy);
    padding: 4px 12px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    border-radius: 2px;
}

.specialite-content {
    padding: 0.75rem;
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
    flex-grow: 1;
}

.specialite-content h3 {
    font-size: 0.95rem;
    color: var(--white);
    margin: 0;
    font-family: var(--font-title);
}

.specialite-content p {
    color: rgba(255, 255, 255, 0.75);
    margin: 0;
    font-size: 0.75rem;
    line-height: 1.4;
}

.specialite-meta {
    display: flex;
    gap: 0.75rem;
    font-size: 0.75rem;
    color: var(--pink);
    margin-top: 0.3rem;
}

.btn-sm {
    padding: 0.5rem 1rem;
    font-size: 11px;
}

/* ═══════════════════════════════════════════════════════════════
   QUALITY SECTION - PREMIUM REDESIGN
═══════════════════════════════════════════════════════════════ */

.quality-section {
    padding: 5rem 0;
    background: var(--bg-light);
    position: relative;
}

/* Header */
.quality-header {
    text-align: center;
    margin-bottom: 3.5rem;
}

.quality-header h2 {
    margin-bottom: 0;
    font-size: 1.75rem;
}

/* Cards Grid */
.quality-cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
    margin-bottom: 2.5rem;
}

/* Card Base */
.quality-card {
    position: relative;
    padding: 2.5rem 1.75rem;
    border-radius: 2px;
    background: var(--white);
    border: 1px solid rgba(27, 38, 58, 0.08);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    display: flex;
    flex-direction: column;
    gap: 1rem;
    height: 100%;
    min-height: 240px;
}

.quality-card:hover {
    border-color: rgba(245, 195, 219, 0.5);
    box-shadow: 0 16px 64px rgba(27, 38, 58, 0.15);
    transform: translateY(-8px);
}

/* Icon Circle */
.quality-icon-circle {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 0.5rem;
    transition: all 0.4s ease;
}

.quality-card-1 .quality-icon-circle {
    background: rgba(245, 195, 219, 0.2);
    border: 2px solid rgba(204, 51, 102, 0.3);
}

.quality-card-2 .quality-icon-circle {
    background: rgba(204, 51, 102, 0.15);
    border: 2px solid rgba(204, 51, 102, 0.25);
}

.quality-card-3 .quality-icon-circle {
    background: rgba(27, 38, 58, 0.1);
    border: 2px solid rgba(27, 38, 58, 0.2);
}

.quality-card:hover .quality-icon-circle {
    transform: scale(1.15);
    border-color: rgba(204, 51, 102, 0.5);
}

.quality-icon {
    width: 36px;
    height: 36px;
    stroke-width: 1.5;
    transition: all 0.4s ease;
}

.quality-card-1 .quality-icon {
    color: var(--pink-dark);
}

.quality-card-2 .quality-icon {
    color: var(--pink-dark);
}

.quality-card-3 .quality-icon {
    color: var(--navy);
}

.quality-card:hover .quality-icon {
    transform: scale(1.2) rotate(8deg);
    filter: drop-shadow(0 4px 12px rgba(204, 51, 102, 0.25));
}

/* Content */
.quality-card-content {
    position: relative;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.quality-card h3 {
    font-family: var(--font-title);
    font-size: 1.15rem;
    color: var(--navy);
    margin: 0;
    font-weight: 700;
    letter-spacing: -0.01em;
}

.quality-card-1 h3 {
    color: var(--pink-dark);
}

.quality-detail {
    font-size: 0.85rem;
    line-height: 1.6;
    color: var(--text-light);
    margin: 0;
    flex-grow: 1;
}

/* Badge */
.quality-badge {
    display: inline-block;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    background: rgba(204, 51, 102, 0.12);
    color: var(--pink-dark);
    padding: 4px 10px;
    border-radius: 2px;
    border: 1px solid rgba(204, 51, 102, 0.35);
    width: fit-content;
    transition: all 0.3s ease;
    margin-top: auto;
}

.quality-card:hover .quality-badge {
    background: rgba(204, 51, 102, 0.18);
    border-color: rgba(204, 51, 102, 0.6);
    transform: translateX(3px);
}

/* Promise Statement */
.quality-promise {
    text-align: center;
    font-size: 1.05rem;
    font-weight: 600;
    color: var(--navy);
    padding-top: 2rem;
    border-top: 1px solid rgba(27, 38, 58, 0.12);
    margin: 0;
}

/* CTA Section */
.cta-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-top: 1.5rem;
}

.cta-actions .btn {
    flex: 1;
    min-width: 200px;
}

/* Media Queries */
@media (max-width: 1024px) {
    .specialites-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.25rem;
    }

    .quality-cards-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .quality-card {
        min-height: 220px;
        padding: 2rem 1.5rem;
    }
}

@media (max-width: 768px) {
    .specialites-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .quality-section {
        padding: 3rem 0;
    }

    .quality-cards-grid {
        grid-template-columns: 1fr;
        gap: 1.25rem;
    }

    .quality-card {
        padding: 2rem 1.5rem;
        min-height: 200px;
    }

    .quality-icon-circle {
        width: 56px;
        height: 56px;
    }

    .quality-icon {
        width: 32px;
        height: 32px;
    }

    .quality-card h3 {
        font-size: 1.05rem;
    }

    .quality-detail {
        font-size: 0.8rem;
        line-height: 1.5;
    }

    .quality-header {
        margin-bottom: 2.5rem;
    }

    .quality-header h2 {
        font-size: 1.5rem;
    }

    .quality-promise {
        font-size: 0.95rem;
        padding-top: 1.5rem;
    }

    .cta-actions {
        flex-direction: column;
    }

    .cta-actions .btn {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .specialites-grid {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }

    .quality-section {
        padding: 2.5rem 0;
    }

    .quality-cards-grid {
        gap: 1rem;
    }

    .quality-card {
        padding: 1.5rem 1.25rem;
        min-height: 180px;
        gap: 0.75rem;
    }

    .quality-icon-circle {
        width: 52px;
        height: 52px;
        margin-bottom: 0.25rem;
    }

    .quality-icon {
        width: 28px;
        height: 28px;
    }

    .quality-card h3 {
        font-size: 1rem;
    }

    .quality-detail {
        font-size: 0.75rem;
        line-height: 1.4;
    }

    .quality-header {
        margin-bottom: 2rem;
    }

    .quality-header h2 {
        font-size: 1.35rem;
    }

    .quality-badge {
        font-size: 9px;
        padding: 3px 8px;
    }

    .quality-promise {
        font-size: 0.85rem;
        padding-top: 1.25rem;
    }
}
</style>
