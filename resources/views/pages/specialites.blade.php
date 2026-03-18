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
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
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
        <span class="section-tag">🌟 Nos Spécialités</span>
        <h1>Nos Spécialités<br><em>L'Excellence à chaque bouchée</em></h1>
        <p class="hero-sub">Smash, Bagels, Cheesecake & Breakfast : 4 piliers du goût authentique</p>
        <div class="hero-ctas">
            <a href="{{ route('menu.burgers') }}" class="btn btn-pink">
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
                <span class="section-tag dark">Chaque spécialité</span>
                <h2 class="section-title dark">
                    Chaque spécialité<br>
                    <em>raconte une histoire</em>
                </h2>
                <p>Chez Factory &amp; Co, nos spécialités ne sont pas juste des plats. Ce sont des célébrations du savoir-faire, nées de la passion du chef <strong>Jonathan Jablonski</strong> et de son engagement envers l'authenticité.</p>
                <p>Chaque recette a été affinée au fil des années. Chaque ingrédient sélectionné avec soin. Chaque préparation respecte des standards qu'on ne compromet jamais.</p>
                <p><strong>Ici, on ne fait pas des compromis. Jamais.</strong></p>
            </div>
            <div class="concept-image">
                <img src="{{ asset('images/factory-val-interieur.webp') }}"
                     alt="Intérieur Factory & Co Val d'Europe"
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
                    <p>L'art de la simplicité. Plaque brûlante, viande frémissante, fromage coulant. Le burger comme il faut.</p>
                    <div class="specialite-meta">
                        <span>⏱️ Rapide</span>
                        <span>🔥 Gourmand</span>
                    </div>
                    <a href="{{ route('menu.burgers') }}" class="btn btn-pink btn-sm">
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
                    <p>Directement de Brooklyn. Croquant dehors, moelleux dedans. Un aller simple pour New York, sans quitter votre table.</p>
                    <div class="specialite-meta">
                        <span>🌅 Breakfast</span>
                        <span>✨ Artisanal</span>
                    </div>
                    <a href="{{ route('menu.bagels') }}" class="btn btn-pink btn-sm">
                        Découvrir
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- CHEESECAKE --}}
            <div class="specialite-card">
                <div class="specialite-image">
                    <img src="https://restaurants.factoryandco.com/wp-content/uploads/2024/05/Factory_And_Co_Claye_Souilly_Jon_Filin_Burger_Cheesecake_Sports_Bar-6.png" alt="Cheesecake Factory & Co" loading="lazy">
                    <span class="specialite-badge">Must-try</span>
                </div>
                <div class="specialite-content">
                    <h3>Cheesecake Factory</h3>
                    <p>Noir New-Yorkais. Fromage frais, biscuit beurre, crème fouettée. L'indulgence en assiette, signée Factory &amp; Co.</p>
                    <div class="specialite-meta">
                        <span>🎂 Dessert</span>
                        <span>💎 Iconique</span>
                    </div>
                    <a href="{{ route('menu.cheesecake') }}" class="btn btn-pink btn-sm">
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
                    <p>Ouverts dès 07h00. Bagels frais, œufs brouillés, bacon croustillant, café de qualité. Le vrai breakfast, pas la version pauvre.</p>
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
            <span class="section-tag dark">Notre promesse</span>
            <h2 class="section-title dark">Qualité<br><em>sans compromis</em></h2>
            <p class="quality-subtitle">Trois piliers qui font la différence à chaque assiette</p>
        </div>

        <div class="quality-cards-grid">
            {{-- PILIER 1: FRAÎCHEUR --}}
            <div class="quality-card quality-card-1">
                <div class="quality-card-bg"></div>
                <div class="quality-card-image">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="quality-icon">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 2v20M2 12h20"/>
                    </svg>
                </div>
                <div class="quality-card-content">
                    <h3>Fraîcheur</h3>
                    <p class="quality-description">100% préparé à la commande</p>
                    <p class="quality-detail">Zéro surgelé. Zéro compromis. Chaque plat respire la fraîcheur du moment.</p>
                    <div class="quality-badge">À la commande</div>
                </div>
                <div class="quality-card-accent"></div>
            </div>

            {{-- PILIER 2: CRAFT --}}
            <div class="quality-card quality-card-2">
                <div class="quality-card-bg"></div>
                <div class="quality-card-image">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="quality-icon">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <div class="quality-card-content">
                    <h3>Craft</h3>
                    <p class="quality-description">Expertise du chef Jonathan Jablonski</p>
                    <p class="quality-detail">Recettes exclusives formées aux côtés des plus grands de Brooklyn. 15+ ans d'expérience culinaire.</p>
                    <div class="quality-badge">Premium Experience</div>
                </div>
                <div class="quality-card-accent"></div>
            </div>

            {{-- PILIER 3: AUTHENTICITÉ --}}
            <div class="quality-card quality-card-3">
                <div class="quality-card-bg"></div>
                <div class="quality-card-image">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="quality-icon">
                        <path d="M12 2l2 4h4l-3 3 1 4-4-2-4 2 1-4-3-3h4l2-4z"/>
                        <circle cx="12" cy="12" r="10" stroke-width="0.5" opacity="0.3"/>
                    </svg>
                </div>
                <div class="quality-card-content">
                    <h3>Authenticité</h3>
                    <p class="quality-description">L'ADN New-Yorkais authentique</p>
                    <p class="quality-detail">Ingrédients sélectionnés avec soin. Goût New-Yorkais authentique. L'essence des diners américains, au cœur de Val d'Europe.</p>
                    <div class="quality-badge">New-York Heritage</div>
                </div>
                <div class="quality-card-accent"></div>
            </div>
        </div>

        {{-- Trust Statement --}}
        <div class="quality-trust-statement">
            <p>Chaque assiette Factory & Co est une promesse tenue.</p>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : CTA COMMANDER
════════════════════════════════════════════ --}}
<section class="section section-cta-large">
    <div class="container">
        <div class="cta-large-content">
            <img src="{{ asset('images/ashley.webp') }}" alt="Prêt à vivre l'expérience" class="cta-image">
            <div class="cta-text">
                <h2>Prêt à vivre<br>l'expérience ?</h2>
                <p>Nos spécialités vous attendent. Que ce soit sur place, à emporter, ou en commande rapide : vivez l'authenticité Factory &amp; Co.</p>
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
            <h2>Restez connecté</h2>
            <p>Recevez nos nouveaux menus, promotions et actualités spécialités en avant-première.</p>
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
    display: flex;
    gap: 2rem;
    margin-bottom: 3rem;
    overflow-x: auto;
    scroll-behavior: smooth;
    padding: 0.5rem 0;
    -webkit-overflow-scrolling: touch;
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
    min-width: 320px;
    flex-shrink: 0;
}

.specialite-card:hover {
    background: rgba(255, 255, 255, 0.08);
    border-color: rgba(255, 255, 255, 0.2);
    transform: translateY(-4px);
}

.specialite-image {
    position: relative;
    overflow: hidden;
    aspect-ratio: 16/9;
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
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    flex-grow: 1;
}

.specialite-content h3 {
    font-size: 1.35rem;
    color: var(--white);
    margin: 0;
    font-family: var(--font-title);
}

.specialite-content p {
    color: rgba(255, 255, 255, 0.75);
    margin: 0;
    font-size: 0.95rem;
    line-height: 1.6;
}

.specialite-meta {
    display: flex;
    gap: 1rem;
    font-size: 0.85rem;
    color: var(--pink);
    margin-top: 0.5rem;
}

.btn-sm {
    padding: 0.6rem 1.25rem;
    font-size: 12px;
}

/* ═══════════════════════════════════════════════════════════════
   QUALITY SECTION - PREMIUM REDESIGN
═══════════════════════════════════════════════════════════════ */

.quality-section {
    padding: 6rem 0;
    background: var(--bg-light);
    position: relative;
}

/* Header */
.quality-header {
    text-align: center;
    margin-bottom: 4rem;
}

.quality-header h2 {
    margin-bottom: 1rem;
}

.quality-subtitle {
    font-size: 1.15rem;
    color: var(--text-light);
    margin-top: 1rem;
    font-weight: 400;
}

/* Cards Grid */
.quality-cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2.5rem;
    margin-bottom: 3.5rem;
}

/* Card Base */
.quality-card {
    position: relative;
    padding: 2.5rem;
    border-radius: 2px;
    overflow: hidden;
    background: var(--white);
    border: 1px solid rgba(27, 38, 58, 0.08);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    display: flex;
    flex-direction: column;
    height: 100%;
    min-height: 420px;
}

.quality-card:hover {
    border-color: rgba(245, 195, 219, 0.4);
    box-shadow: 0 12px 48px rgba(27, 38, 58, 0.12);
    transform: translateY(-6px);
}

/* Background Gradient (per card) */
.quality-card-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0;
    transition: opacity 0.5s ease;
    pointer-events: none;
}

.quality-card-1 .quality-card-bg {
    background: linear-gradient(135deg, rgba(245, 195, 219, 0.08) 0%, rgba(204, 51, 102, 0.04) 100%);
}

.quality-card-2 .quality-card-bg {
    background: linear-gradient(135deg, rgba(204, 51, 102, 0.08) 0%, rgba(245, 195, 219, 0.04) 100%);
}

.quality-card-3 .quality-card-bg {
    background: linear-gradient(135deg, rgba(27, 38, 58, 0.06) 0%, rgba(204, 51, 102, 0.04) 100%);
}

.quality-card:hover .quality-card-bg {
    opacity: 1;
}

/* Icon Container */
.quality-card-image {
    width: 80px;
    height: 80px;
    margin-bottom: 2rem;
    position: relative;
    z-index: 2;
}

.quality-icon {
    width: 100%;
    height: 100%;
    color: var(--navy);
    stroke-width: 1.5;
    transition: all 0.4s ease;
}

.quality-card-1 .quality-icon {
    color: var(--pink-dark);
}

.quality-card:hover .quality-icon {
    transform: scale(1.1) rotate(-5deg);
    filter: drop-shadow(0 4px 12px rgba(204, 51, 102, 0.2));
}

/* Content */
.quality-card-content {
    position: relative;
    z-index: 2;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.quality-card h3 {
    font-family: var(--font-title);
    font-size: 1.5rem;
    color: var(--navy);
    margin-bottom: 0.75rem;
    font-weight: 700;
    letter-spacing: -0.01em;
}

.quality-card-1 h3 {
    color: var(--pink-dark);
}

.quality-description {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--navy);
    margin-bottom: 0.75rem;
}

.quality-detail {
    font-size: 0.95rem;
    line-height: 1.7;
    color: var(--text-light);
    margin-bottom: 1.5rem;
    flex-grow: 1;
}

/* Badge */
.quality-badge {
    display: inline-block;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    background: rgba(204, 51, 102, 0.1);
    color: var(--pink-dark);
    padding: 6px 14px;
    border-radius: 2px;
    border: 1px solid rgba(204, 51, 102, 0.3);
    margin-top: auto;
    width: fit-content;
    transition: all 0.3s ease;
}

.quality-card:hover .quality-badge {
    background: rgba(204, 51, 102, 0.15);
    border-color: rgba(204, 51, 102, 0.5);
    transform: translateX(2px);
}

/* Accent Corner */
.quality-card-accent {
    position: absolute;
    bottom: -1px;
    right: -1px;
    width: 100px;
    height: 100px;
    background: radial-gradient(circle at top-left, rgba(245, 195, 219, 0.1) 0%, transparent 70%);
    border-radius: 2px;
    pointer-events: none;
}

/* Trust Statement */
.quality-trust-statement {
    text-align: center;
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--navy);
    margin-top: 2rem;
    padding: 2rem;
    border-top: 1px solid rgba(27, 38, 58, 0.1);
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
@media (max-width: 768px) {
    .quality-section {
        padding: 4rem 0;
    }

    .quality-cards-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .quality-card {
        min-height: 380px;
    }

    .quality-card-image {
        width: 70px;
        height: 70px;
        margin-bottom: 1.5rem;
    }

    .quality-card h3 {
        font-size: 1.35rem;
    }

    .quality-header {
        margin-bottom: 3rem;
    }

    .quality-trust-statement {
        font-size: 1.1rem;
        padding: 1.5rem;
    }

    .cta-actions {
        flex-direction: column;
    }

    .cta-actions .btn {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .quality-section {
        padding: 3rem 0;
    }

    .quality-card {
        padding: 1.75rem;
        min-height: 350px;
    }

    .quality-card h3 {
        font-size: 1.2rem;
    }

    .quality-detail,
    .quality-description {
        font-size: 0.9rem;
    }

    .quality-header h2 {
        font-size: 1.75rem;
    }

    .quality-subtitle {
        font-size: 1rem;
    }
}
</style>
