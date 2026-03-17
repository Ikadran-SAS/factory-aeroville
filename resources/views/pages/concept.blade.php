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
        <span class="section-tag">PHILOSOPHIE</span>
        <h1>L'Âme d'un Diner Authentique</h1>
        <p>Factory & Co n'est pas qu'un restaurant. C'est une philosophie : celle de ramener l'authenticité des diners new-yorkais au cœur de Val d'Europe.</p>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : L'HISTOIRE
════════════════════════════════════════════ --}}
<section class="section section-light">
    <div class="container">
        <div class="concept-grid">
            <div class="concept-text">
                <h2 class="concept-title concept-title-small">Une Histoire de Passion</h2>
                <p>En 2008, <strong>Jonathan Jablonski</strong>, un chef formé aux côtés des plus grands cuisiniers de Brooklyn, a décidé de transporter l'âme authentique des diners new-yorkais au cœur du centre commercial Val d'Europe.</p>
                <p>Pas de recettes figées, pas de surgelé. Juste une conviction : <strong>chaque plat doit respirer la passion et la qualité</strong>.</p>
                <p style="margin-top: 2rem; font-style: italic; color: var(--pink-dark);">"Factory & Co, c'est l'histoire d'une liberté : celle de bien manger, sans compromis."</p>
            </div>
            <div class="concept-image">
                <img src="{{ asset('images/factory-val-interieur.webp') }}" alt="Intérieur Factory & Co" loading="lazy">
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : LES 3 PILIERS
════════════════════════════════════════════ --}}
<section class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2 class="concept-title light">Les Trois Piliers de notre Concept</h2>
            <p class="text-light-muted">Ce qui fait de Factory & Co un endroit unique</p>
        </div>
        <div class="pillars-grid">
            <div class="pillar-card">
                <div class="pillar-icon">🔥</div>
                <h3>Fait Maison à la Minute</h3>
                <p>100% de nos plats sont préparés à la commande. Pas de plateau précuit, pas de sauce réfrigérée depuis trois jours. Juste de la fraîcheur, à chaque fois.</p>
                <ul class="pillar-list">
                    <li>Viande sélectionnée</li>
                    <li>Pains frais du jour</li>
                    <li>Sauces maison</li>
                </ul>
            </div>
            <div class="pillar-card">
                <div class="pillar-icon">🌟</div>
                <h3>Qualité Artisanale</h3>
                <p>Chaque ingrédient est choisi pour son goût, pas pour son coût. Nous travaillons avec des fournisseurs locaux et des producteurs de confiance.</p>
                <ul class="pillar-list">
                    <li>Fromages premium</li>
                    <li>Fruits frais de saison</li>
                    <li>Ingrédients traçables</li>
                </ul>
            </div>
            <div class="pillar-card">
                <div class="pillar-icon">❤️</div>
                <h3>Passion & Savoir-Faire</h3>
                <p>Notre équipe vit sa cuisine. Chaque burger est smashé sur plaque brûlante avec intention. Chaque cheesecake est une œuvre.</p>
                <ul class="pillar-list">
                    <li>Chef Jonathan Jablonski</li>
                    <li>Équipe formée</li>
                    <li>Perfectionnisme culinaire</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : SAVOIR-FAIRE
════════════════════════════════════════════ --}}
<section class="section section-light">
    <div class="container">
        <h2 class="concept-title">Comment on Prépare un Burger Factory & Co</h2>
        <div class="process-timeline">
            <div class="process-step">
                <div class="process-number">1</div>
                <h3>Sélection de la Viande</h3>
                <p>Nous choisissons notre viande fraîche chaque matin auprès de nos fournisseurs. 80/20 de ratio gras/maigre : le sweet spot pour un smash burger.</p>
            </div>
            <div class="process-step">
                <div class="process-number">2</div>
                <h3>Smash sur Plaque Brûlante</h3>
                <p>La viande arrive à température ambiante et est pressée sur une plaque à 200°C pendant 1 minute 30. Croûte parfaite = Maillard optimal.</p>
            </div>
            <div class="process-step">
                <div class="process-number">3</div>
                <h3>Fromage & Garnitures</h3>
                <p>Fromage américain fondu, tomate fraîche, salade croustillante, oignon caramélisé. Chaque élément arrive au bon moment.</p>
            </div>
            <div class="process-step">
                <div class="process-number">4</div>
                <h3>Le Bun & la Sauce</h3>
                <p>Pain toasté à la main, sauce maison généroyeuse. C'est la finition qui transforme un burger en expérience.</p>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : AMBIANCE & EXPÉRIENCE
════════════════════════════════════════════ --}}
<section class="section section-dark">
    <div class="container">
        <div class="concept-grid concept-grid-reverse">
            <div class="concept-image">
                <div class="concept-image-placeholder">
                    <span>📸</span>
                </div>
            </div>
            <div class="concept-text">
                <h2 class="concept-title light">Une Expérience, Pas Juste un Repas</h2>
                <p class="text-light-muted">Factory & Co c'est aussi une atmosphère. Des murs couleur navy, des néons rose, une musique qui respire l'âme new-yorkaise.</p>
                <p class="text-light-muted" style="margin-top: 1.5rem;">C'est l'endroit où les voyageurs avant leur vol peuvent prendre une vraie pause. Pas une chaîne anonyme. Une adresse authentique avec du caractère.</p>
                <div style="margin-top: 2rem; display: flex; gap: 1.5rem; flex-wrap: wrap;">
                    <div class="experience-badge">
                        <strong>Ouvert 7j/7</strong>
                        <span>365 jours par an</span>
                    </div>
                    <div class="experience-badge">
                        <strong>Service Rapide</strong>
                        <span>10 min pour commander</span>
                    </div>
                    <div class="experience-badge">
                        <strong>À Emporter</strong>
                        <span>Parfait pour les voyages</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : VALEURS
════════════════════════════════════════════ --}}
<section class="section section-light">
    <div class="container">
        <div class="section-header">
            <h2 class="concept-title">Ce en Quoi On Croit</h2>
        </div>
        <div class="values-grid">
            <div class="value-item">
                <h3>🌱 Responsabilité</h3>
                <p>Nous travaillons avec des fournisseurs qui partagent nos valeurs. Pas d'OGM, pas de conservateurs inutiles.</p>
            </div>
            <div class="value-item">
                <h3>♻️ Éco-Conscience</h3>
                <p>Nos emballages sont recyclables. Nos déchets de cuisine sont valorisés. Parce que la qualité c'est aussi de la conscience.</p>
            </div>
            <div class="value-item">
                <h3>🤝 Humain d'Abord</h3>
                <p>Notre équipe c'est notre fierté. Salaires justes, formation continue, environnement de travail bienveillant.</p>
            </div>
            <div class="value-item">
                <h3>🎯 Excellence</h3>
                <p>Pas de compromis. Si ça ne monte pas à notre standard, ça ne sort pas. Point.</p>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     CTA SECTION
════════════════════════════════════════════ --}}
<section class="section section-cta" style="background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%); padding: 4rem 0; text-align: center;">
    <div class="container">
        <h2 class="section-title light">Prêt à Vivre l'Expérience ?</h2>
        <p class="text-light-muted" style="max-width: 600px; margin: 0 auto 2rem;">Venez découvrir Factory & Co. Commandez en ligne avec click & collect, ou venez nous rendre visite directement au Val d'Europe.</p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('menu.burgers') }}" class="btn btn-pink">Découvrir la Carte</a>
            <a href="{{ route('click-collect') }}" class="btn btn-outline-white">Click & Collect</a>
        </div>
    </div>
</section>

@endsection
