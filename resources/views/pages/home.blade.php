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
            ]
        ]
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

{{-- ════════════════════════════════════════════
     HERO SECTION - PLEIN ÉCRAN
════════════════════════════════════════════ --}}
<section class="hero" aria-label="Factory & Co Val d'Europe">
    <div class="hero-bg" style="background-image:url('{{ asset('images/factory-val.webp') }}')" aria-hidden="true"></div>
    <div class="hero-overlay" aria-hidden="true"></div>
    <div class="hero-content">
        <p class="hero-location">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            CC Val d'Europe · 14 Rue du Danube · Serris
        </p>
        <h1 class="hero-title">
            Factory &amp; Co<br>
            Val d'Europe :<br>
            L'<em>Authentique Diner</em> Américain
        </h1>
        <p class="hero-sub">Smash Burgers · Bagels New-Yorkais · Cheesecake Factory · Healthy Bowls</p>
        <p class="hero-hours">Ouvert 7j/7 · 07:00 – 22:30 · Delicious since 2008</p>
        <div class="hero-ctas">
            <a href="javascript:void(0)" onclick="window.factoryCoNav && window.factoryCoNav.openNavigationModal()" class="btn btn-pink">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                Venir chez nous
            </a>
            <a href="{{ route('menu.burgers') }}" class="btn btn-outline-white">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Découvrir la Carte
            </a>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : LA PHILOSOPHIE
════════════════════════════════════════════ --}}
<section class="section section-light">
    <div class="container">
        <div class="concept-grid">
            <div class="concept-text">
                <span class="section-tag">La Liberté de la Gastronomie</span>
                <h2 class="section-title dark">
                    Une Escale Gourmande<br>
                    Authentiquement Américaine
                </h2>
                <p>Factory &amp; Co, c'est l'histoire d'une passion : celle du chef <strong>Jonathan Jablonski</strong>, formé aux côtés des plus grands cuisiniers de <strong>Brooklyn</strong>. En 2008, il a décidé de transporter l'âme authentique des diners new-yorkais au cœur du centre commercial Val d'Europe.</p>
                <p>Chez nous, <strong>rien n'est surgelé, tout est préparé à la minute</strong>. Chaque burger est smashé sur plaque brûlante. Chaque bagel est frais du jour. Chaque cheesecake respire les meilleures traditions new-yorkaises.</p>
                <p><strong>Factory &amp; Co, c'est la liberté de bien manger, sans compromis.</strong></p>
                <a href="{{ route('menu.burgers') }}" class="btn btn-navy">
                    Explorer Notre Concept
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="concept-image">
                <img src="{{ asset('images/factory-val-interieur.webp') }}"
                     alt="Ambiance diner américain Factory & Co Val d'Europe"
                     loading="lazy" width="700" height="500">
                <div class="concept-badge">
                    <span class="concept-badge-title">Delicious</span>
                    <span class="concept-badge-sub">since 2008</span>
                    <span class="concept-badge-detail">Fait maison · À la commande</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : STATISTIQUES
════════════════════════════════════════════ --}}
<section class="section section-dark stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">2008</div>
                <div class="stat-label">Année de Création</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">100%</div>
                <div class="stat-label">Préparé à la Minute</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">4.5★</div>
                <div class="stat-label">Note Google</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">320+</div>
                <div class="stat-label">Avis Clients</div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : GALERIE PRODUITS PREMIUM
════════════════════════════════════════════ --}}
<section class="section section-dark" id="carte">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag">Galerie</span>
            <h2 class="section-title light">Le Meilleur de Factory &amp; Co Val d'Europe</h2>
        </div>

        {{-- Composant Vue.js : données injectées depuis Blade --}}
        <product-grid
            :products="{{ json_encode($featuredProducts) }}"
            :routes="{{ json_encode([
                'burgers'    => route('menu.burgers'),
                'bagels'     => route('menu.bagels'),
                'cheesecake' => route('menu.cheesecake'),
                'bowls'      => route('menu.bowls'),
            ]) }}"
        ></product-grid>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : GALERIE PHOTOS
════════════════════════════════════════════ --}}
<section class="section section-light">
    <div class="container">
        <div class="gallery-premium">
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="{{ asset('images/factory-val-2.webp') }}" alt="Factory & Co Val d'Europe" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/factory-val-3.webp') }}" alt="Factory & Co Val d'Europe" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/factory-val-4.webp') }}" alt="Factory & Co Val d'Europe" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : AVIS CLIENTS
════════════════════════════════════════════ --}}
<section class="section section-dark" id="avis">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag">Google Reviews &amp; TripAdvisor</span>
            <h2 class="section-title light">Pourquoi Ils Nous Font Confiance</h2>
        </div>
        <reviews-carousel
            :reviews="{{ json_encode($featuredReviews) }}"
            aggregate-rating="4.5"
            review-count="320"
        ></reviews-carousel>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : LOCALISATION
════════════════════════════════════════════ --}}
<section class="section section-light" id="horaires">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag">Nous Visiter</span>
            <h2 class="section-title dark">Au Cœur de Val d'Europe</h2>
        </div>

        <div class="location-grid">
            <div class="location-info">
                <h3>Informations Pratiques</h3>

                <div class="info-block">
                    <h4>📍 Adresse</h4>
                    <p>14 Rue du Danube<br>CC Val d'Europe<br>77700 Serris</p>
                </div>

                <div class="info-block">
                    <h4>🕐 Horaires</h4>
                    <table class="hours-table">
                        <tbody>
                            @foreach($openingHours as $hours)
                                <tr>
                                    <td><strong>{{ $hours->days_label }}</strong></td>
                                    <td>{{ $hours->opens_at_formatted }} – {{ $hours->closes_at_formatted }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="info-block">
                    <h4>🚗 Accès</h4>
                    <p><strong>Parking gratuit</strong> du centre commercial<br>
                    <strong>RER E</strong> - Gare du Val d'Europe<br>
                    <strong>Proche de Disneyland Paris</strong></p>
                </div>

                <div class="service-badges">
                    @foreach(['Sur place', 'À emporter', 'Click & Collect', 'Halal', 'Végétarien', 'Family Friendly', 'Accessible PMR'] as $badge)
                        <span class="service-badge">{{ $badge }}</span>
                    @endforeach
                </div>
            </div>

            <div class="map-wrap">
                <iframe
                    title="Localisation Factory & Co Val d'Europe"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2622.0!2d2.7758!3d48.8753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e614d4c8c8c8c8%3A0x1!2sFactory+%26+Co+Val+d%27Europe!5e0!3m2!1sfr!2sfr!4v1"
                    allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : CTA COMMANDER
════════════════════════════════════════════ --}}
<section class="section section-cta-large">
    <div class="container">
        <div class="cta-large-content">
            <img src="{{ asset('images/ashley.webp') }}" alt="Commander chez Factory & Co" class="cta-image">
            <div class="cta-text">
                <h2>Commander pour Plus Tard</h2>
                <p>Anticipez votre visite ! Commandez en ligne et récupérez votre repas au moment choisi. Parfait pour les visiteurs pressés ou ceux qui veulent optimiser leur temps au centre commercial.</p>
                <a href="{{ route('click-collect') }}" class="btn btn-pink">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    Commander Maintenant
                </a>
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
            <span class="section-tag">Questions ?</span>
            <h2 class="section-title dark">Questions Fréquentes</h2>
        </div>
        <faq-accordion :faqs="{{ json_encode($faqs ?? []) }}"></faq-accordion>
        <div class="faq-cta text-center">
            <p>Vous avez d'autres questions ?</p>
            <a href="{{ route('contact') }}" class="btn btn-outline-navy">Nous Contacter</a>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : NEWSLETTER
════════════════════════════════════════════ --}}
<section class="section section-dark newsletter-section">
    <div class="container">
        <div class="newsletter-content">
            <h2>Restez Connecté</h2>
            <p>Recevez nos bons plans, nouveaux menus et actualités Factory &amp; Co en avant-première.</p>
            <form class="newsletter-form" method="POST" action="#">
                @csrf
                <input type="email" placeholder="votre@email.com" required>
                <button type="submit" class="btn btn-pink">S'abonner</button>
            </form>
        </div>
    </div>
</section>

@endsection
