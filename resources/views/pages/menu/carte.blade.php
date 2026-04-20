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

    $webPageSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebPage',
        '@id' => route('menu.index'),
        'url' => route('menu.index'),
        'name' => 'La Carte – Factory & Co Aéroville',
        'description' => 'Carte complète Factory & Co Aéroville. Smash Burgers Halal, Bagels New-Yorkais, Cheesecakes maison, Bowls. CC Westfield Aéroville, Tremblay-en-France.',
        'isPartOf' => [
            '@type' => 'WebSite',
            '@id' => route('home')
        ],
        'breadcrumb' => [
            '@id' => '#breadcrumb'
        ]
    ];

    $menuSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Menu',
        'name' => 'La Carte – Factory & Co',
        'hasMenuSection' => [
            [
                '@type' => 'MenuSection',
                'name' => 'Salé',
                'description' => 'Nos créations salées : burgers, bagels, bowls, sides et menus kids',
                'position' => 1,
                'hasMenuSection' => [
                    ['@type' => 'MenuSection', 'name' => 'Burgers', 'description' => 'Nos incontournables smash burgers avec viande Angus certifiée halal', 'position' => 1],
                    ['@type' => 'MenuSection', 'name' => 'Bagels', 'description' => 'Recette authentique, fabriqués en atelier avec une farine canadienne riche en protéines', 'position' => 2],
                    ['@type' => 'MenuSection', 'name' => 'Bowls', 'description' => 'Bowls sains, vegan et végétariens', 'position' => 3],
                    ['@type' => 'MenuSection', 'name' => 'Sides', 'description' => 'Frites crinkle et accompagnements gourmands', 'position' => 4],
                    ['@type' => 'MenuSection', 'name' => 'Pièces de poulet crunchy', 'description' => 'Nuggets et tenders marinés 12h, panés à la main', 'position' => 5],
                ]
            ],
            [
                '@type' => 'MenuSection',
                'name' => 'Sucré',
                'description' => 'Cheesecakes premium, desserts et formules breakfast',
                'position' => 2,
                'hasMenuSection' => [
                    ['@type' => 'MenuSection', 'name' => 'Cheesecakes', 'description' => 'Recettes exclusives, fabriqués en atelier à base de cream cheese Philadelphia', 'position' => 1],
                    ['@type' => 'MenuSection', 'name' => 'Desserts', 'description' => 'Cookies, pâtisseries et douceurs', 'position' => 2],
                    ['@type' => 'MenuSection', 'name' => 'Breakfast', 'description' => 'Formules petit-déjeuner sucrées', 'position' => 3],
                ]
            ],
            [
                '@type' => 'MenuSection',
                'name' => 'Boissons',
                'description' => 'Cocktails, milkshakes, smoothies, coffeeshop et boissons',
                'position' => 3,
            ]
        ]
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($webPageSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($menuSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
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
    {{-- Background Image --}}
    <div class="hero-bg" style="background-image:url('{{ asset('images/factory-aeroville-hero.webp') }}')" aria-hidden="true"></div>

    {{-- Gradient Overlay --}}
    <div class="hero-overlay"></div>

    {{-- Hero Content --}}
    <div class="hero-content">
        <span class="section-tag">LA CARTE</span>
        <h1>Smashés, roulés, glacés<br>préparés à la minute</h1>
        <p>Burgers, bagels, cheesecakes et bowls : tout ce qui fait la réputation de Factory & Co à Aéroville</p>
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
     MAIN TABS: SALÉ / SUCRÉ / BOISSONS
════════════════════════════════════════════ --}}
<nav class="menu-tabs" id="menu-tabs">
    <button class="menu-tab active" data-tab="sale" aria-label="Salé">
        <span class="tab-icon">&#x1F354;</span>
        <span>Salé</span>
    </button>
    <button class="menu-tab" data-tab="sucre" aria-label="Sucré">
        <span class="tab-icon">&#x1F370;</span>
        <span>Sucré</span>
    </button>
    <button class="menu-tab" data-tab="boissons" aria-label="Boissons">
        <span class="tab-icon">&#x1F379;</span>
        <span>Boissons</span>
    </button>
</nav>

{{-- ════════════════════════════════════════════════════════════
     TAB PANEL: SALÉ
════════════════════════════════════════════════════════════ --}}
<div class="menu-tab-panel active" id="panel-sale">

    {{-- ── BURGERS ── --}}
    <section class="category-section" id="burgers">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x1F354;</span>
                    NYC SMASH BURGERS
                </div>
                <h2 class="category-title">Smash and chicken burgers</h2>
                <p class="category-subtitle">Buns briochés fabriqués en atelier, garnis d'un steak de bœuf Angus smashé et grillé, ou d'un poulet mariné 12h</p>
                <p class="category-description">Little (1 steak 80g) · Regular (2 steaks 160g) · Big (3 steaks 240g). Combo burger : frites crinkle + soft +5€. Pimp ton burger dès 0,50€.</p>
            </div>

            {{-- Product cards from database --}}
            <div class="items-grid">
                @forelse ($burgers as $subcategory => $items)
                    @foreach ($items as $product)
                        <div class="item-card">
                            <div class="item-image" style="background-image: url('{{ asset($product->image_url) }}')">
                                <span class="price-badge">
                                    {{ number_format($product->price, 2, ',', '') }}€
                                    @if($product->subcategory === 'smash' && $product->name !== 'Big Monster Truck')
                                        <small>Regular</small>
                                    @elseif($product->name === 'Big Monster Truck')
                                        <small>Big</small>
                                    @endif
                                </span>
                            </div>
                            <div class="item-content">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                @if($product->badge)
                                    <span class="{{ $product->badge_class }}">{{ $product->badge }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @empty
                    <p class="text-center">Aucun burger disponible</p>
                @endforelse
            </div>
            @include('pages.menu.partials.download-carte-btn')
        </div>
    </section>

    {{-- ── BAGELS ── --}}
    <section class="category-section category-section-alt" id="bagels">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x1F96F;</span>
                    BAGELS NEW-YORKAIS
                </div>
                <h2 class="category-title">Bagels</h2>
                <p class="category-subtitle">Recette authentique, fabriqués en atelier avec une farine canadienne riche en protéines</p>
                <p class="category-description">Combo bagel : frites crinkle + soft +5€.</p>
            </div>

            <div class="items-grid">
                @forelse ($bagels as $subcategory => $items)
                    @foreach ($items as $product)
                        <div class="item-card">
                            <div class="item-image" style="background-image: url('{{ asset($product->image_url) }}')">
                                <span class="price-badge">{{ number_format($product->price, 2, ',', '') }}€</span>
                            </div>
                            <div class="item-content">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                @if($product->badge)
                                    <span class="{{ $product->badge_class }}">{{ $product->badge }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @empty
                    <p class="text-center">Aucun bagel disponible</p>
                @endforelse
            </div>
            @include('pages.menu.partials.download-carte-btn')
        </div>
    </section>

    {{-- ── BOWLS ── --}}
    <section class="category-section" id="bowls">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x1F957;</span>
                    SUPER BOWLS
                </div>
                <h2 class="category-title">Super bowls</h2>
                <p class="category-subtitle">Que des ingrédients frais et gourmands</p>
                <p class="category-description"></p>
            </div>

            <div class="items-grid">
                @forelse ($bowls as $subcategory => $items)
                    @foreach ($items as $product)
                        <div class="item-card">
                            <div class="item-image" style="background-image: url('{{ asset($product->image_url) }}')">
                                <span class="price-badge">{{ number_format($product->price, 2, ',', '') }}€</span>
                            </div>
                            <div class="item-content">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                @if($product->badge)
                                    <span class="{{ $product->badge_class }}">{{ $product->badge }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @empty
                    <p class="text-center">Aucun bowl disponible</p>
                @endforelse
            </div>
            @include('pages.menu.partials.download-carte-btn')
        </div>
    </section>

    {{-- ── SIDES ── --}}
    <section class="category-section category-section-alt" id="sides">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x1F35F;</span>
                    SIDES
                </div>
                <h2 class="category-title">Sides</h2>
                <p class="category-subtitle">Accompagnements</p>
                <p class="category-description">Frites Crinkle 3,50€ · Frites Patate Douce 5,50€ · Onion Rings par 6 : 3,50€ / par 9 : 4,50€ · Chili Cheese Nuggets par 4 : 3,50€ / par 6 : 5,50€ / par 9 : 7,50€ · Coleslaw Californien 3,50€</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/SIDES/DSC00840.jpg') }}" alt="Frites Crinkle Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Frites crinkle — 3,50€</h3>
                        <p>Ultra croustillantes</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/SIDES/DSC00844.jpg') }}" alt="Frites Patate Douce" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Patate douce — 5,50€</h3>
                        <p>Légèrement sucrées</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/SIDES/DSC00854.jpg') }}" alt="Coleslaw Californien" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Coleslaw — 3,50€</h3>
                        <p>Chou, carottes, raisins secs</p>
                    </div>
                </div>
            </div>

            <div class="photo-strip">
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SAL%C3%89/SIDES/DSC00844.jpg') }}" alt="Sides 1" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SAL%C3%89/SIDES/DSC00854.jpg') }}" alt="Sides 2" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SAL%C3%89/SIDES/DSC00885.jpg') }}" alt="Sides 3" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SAL%C3%89/SIDES/DSC00887.jpg') }}" alt="Sides 4" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SAL%C3%89/SIDES/DSC00898.jpg') }}" alt="Sides 5" loading="lazy">
                </div>
            </div>
            @include('pages.menu.partials.download-carte-btn')
        </div>
    </section>

    {{-- ── PIÈCES DE POULET CRUNCHY ── --}}
    <section class="category-section" id="poulet">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x1F357;</span>
                    PIÈCES DE POULET CRUNCHY
                </div>
                <h2 class="category-title">Poulet crunchy</h2>
                <p class="category-subtitle">Nuggets (version veggie disponible) et tenders marinés 12h, panés à la main</p>
                <p class="category-description">Combo poulet crunchy : frites crinkle + soft +5€.</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/MENU%20KIDS/DSC01289.jpg') }}" alt="Nuggets Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Nuggets</h3>
                        <p>Par 4 : 3,50€ · Par 6 : 5,90€ · Par 9 : 7,90€</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/PLATEAU%20%C3%80%20PARTAGER/DSC01329.jpg') }}" alt="Tenders Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Tenders</h3>
                        <p>Par 2 : 4,50€ · Par 4 : 7,90€ · Par 9 : 16,90€</p>
                    </div>
                </div>
            </div>
            @include('pages.menu.partials.download-carte-btn')
        </div>
    </section>

</div>{{-- end panel-sale --}}

{{-- ════════════════════════════════════════════════════════════
     TAB PANEL: SUCRÉ
════════════════════════════════════════════════════════════ --}}
<div class="menu-tab-panel" id="panel-sucre">

    {{-- ── CHEESECAKE ── --}}
    <section class="category-section" id="cheesecake">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x1F370;</span>
                    CHEESECAKES
                </div>
                <h2 class="category-title">Cheesecakes</h2>
                <p class="category-subtitle">Recettes exclusives, fabriqués en atelier à base de cream cheese Philadelphia</p>
                <p class="category-description"></p>
            </div>

            <div class="items-grid">
                @forelse ($cheesecakes as $subcategory => $items)
                    @foreach ($items as $product)
                        <div class="item-card">
                            <div class="item-image" style="background-image: url('{{ asset($product->image_url) }}')">
                                <span class="price-badge">{{ number_format($product->price, 2, ',', '') }}€</span>
                            </div>
                            <div class="item-content">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                @if($product->badge)
                                    <span class="{{ $product->badge_class }}">{{ $product->badge }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @empty
                    <p class="text-center">Aucun cheesecake disponible</p>
                @endforelse
            </div>
            @include('pages.menu.partials.download-carte-btn')
        </div>
    </section>

    {{-- ── DESSERTS ── --}}
    <section class="category-section category-section-alt" id="desserts">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x1F36A;</span>
                    DESSERTS
                </div>
                <h2 class="category-title">Pâtisseries</h2>
                <p class="category-subtitle">Fabriquées en atelier</p>
                <p class="category-description">Key Lime Pie 5,50€ · Sundae 2,90€ · Cookies dès 3,90€ · Fudgy Brownie 3,90€ · Millionaire Shortbread 4,20€ · Carrot Cake 3,90€ · Banana Cake 3,90€ · Muffins dès 3,90€ · Cinnamon Roll 5,90€</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/Factory%20x%20Plateforme%20026.JPG') }}" alt="Carrot Cake Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Carrot Cake — 3,90€</h3>
                        <p>Glaçage mascarpone et cream cheese vanillé</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/Factory%20x%20Plateforme%20030.JPG') }}" alt="Fudgy Brownie Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Fudgy Brownie — 3,90€</h3>
                        <p>Brownie au chocolat fondant</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/COOKIES/DSC00391.jpg') }}" alt="Cookies Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Cookies — dès 3,90€</h3>
                        <p>Trois chocolats, chocolat au lait et noix</p>
                    </div>
                </div>
            </div>

            <div class="photo-strip">
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/MUFFINS/DSC00309.jpg') }}" alt="Muffins" loading="lazy">
                    <span class="photo-label">Muffins</span>
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/Factory%20x%20Plateforme%20031.JPG') }}" alt="Cinnamon Roll" loading="lazy">
                    <span class="photo-label">Cinnamon Roll</span>
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/Factory%20x%20Social%20Media%204.JPG') }}" alt="Key Lime Pie" loading="lazy">
                    <span class="photo-label">Key Lime Pie</span>
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/Factory%20x%20Social%20Media%205.JPG') }}" alt="Banana Cake" loading="lazy">
                    <span class="photo-label">Banana Cake</span>
                </div>
            </div>
            @include('pages.menu.partials.download-carte-btn')
        </div>
    </section>

    {{-- ── BREAKFAST ── --}}
    <section class="category-section" id="breakfast">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x2615;</span>
                    BREAKFAST
                </div>
                <h2 class="category-title">Breakfast</h2>
                <p class="category-subtitle">Dès 8h30</p>
                <p class="category-description">Formule Express (croissant ou pain au chocolat + expresso) 1,90€ · Formule Pancakes (2 pancakes + spécialité coffee shop) 3,90€ · Pancakes dès 2,90€ · Croissant 1,10€ · Pain au chocolat 1,30€ · Cream Cheese Saumon 7,00€</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SUCR%C3%89/BREAKFAST/DSC01073.jpg') }}" alt="Formule Express Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Formule Express — 1,90€</h3>
                        <p>Croissant ou pain au chocolat + expresso</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SUCR%C3%89/BREAKFAST/DSC01092.jpg') }}" alt="Formule Pancakes Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Formule Pancakes — 3,90€</h3>
                        <p>2 pancakes + spécialité coffee shop</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SUCR%C3%89/BREAKFAST/DSC01094.jpg') }}" alt="Pancakes Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Pancakes — dès 2,90€</h3>
                        <p>Nutella, sirop d'érable ou peanut butter</p>
                    </div>
                </div>
            </div>
            @include('pages.menu.partials.download-carte-btn')
        </div>
    </section>

</div>{{-- end panel-sucre --}}

{{-- ════════════════════════════════════════════════════════════
     TAB PANEL: BOISSONS
════════════════════════════════════════════════════════════ --}}
<div class="menu-tab-panel" id="panel-boissons">

    {{-- ── MILKSHAKES ── --}}
    <section class="category-section category-section-alt" id="milkshakes">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x1F964;</span>
                    MILKSHAKES
                </div>
                <h2 class="category-title">Milkshakes</h2>
                <p class="category-subtitle">Classiques, deluxes et freak shakes</p>
                <p class="category-description">Classiques 5,90€ (chocolat, vanille, fraise, framboise, mangue, coco, chocolat blanc, pistache) · Deluxes 6,90€ (Kinder Bueno, Oréo, Peanut Butter, Nutella) · Freak Shake 10,50€ (milkshake + part de cheesecake)</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01318.jpg') }}" alt="Milkshake classique" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Classiques — 5,90€</h3>
                        <p>Chocolat, vanille, fraise, framboise, mangue, coco, chocolat blanc, pistache</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01351.jpg') }}" alt="Milkshake deluxe" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Deluxes — 6,90€</h3>
                        <p>Kinder Bueno, Oréo, Peanut Butter, Nutella</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01377.jpg') }}" alt="Freak Shake" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Freak Shake — 10,50€</h3>
                        <p>Milkshake surplombé d'une part de cheesecake</p>
                    </div>
                </div>
            </div>

            <div class="photo-strip">
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01347.jpg') }}" alt="Milkshake 1" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01348.jpg') }}" alt="Milkshake 2" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01354.jpg') }}" alt="Milkshake 3" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01363.jpg') }}" alt="Milkshake 4" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01365.jpg') }}" alt="Milkshake 5" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01382.jpg') }}" alt="Milkshake 6" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01393.jpg') }}" alt="Milkshake 7" loading="lazy">
                </div>
            </div>
            @include('pages.menu.partials.download-carte-btn')
        </div>
    </section>

    {{-- ── SMOOTHIES ── --}}
    <section class="category-section" id="smoothies">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x1F353;</span>
                    SMOOTHIES
                </div>
                <h2 class="category-title">Smoothies — 5,50€</h2>
                <p class="category-subtitle">Mixés à la commande</p>
                <p class="category-description">Super Sayan · Sonic Boom · Ban'a Manga · Red Forest. Jus d'orange pressé 36cl : 4,90€.</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/SMOOTHIE/Red%20Forest.jpg') }}" alt="Smoothie Red Forest" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Red Forest</h3>
                        <p>Fraise, framboise, mûre et sundae</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/SMOOTHIE/Ban_a%20Manga.jpg') }}" alt="Smoothie Ban'a Manga" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Ban'a Manga</h3>
                        <p>Mangue, fraise, banane et soja vanille</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/SMOOTHIE/Super%20Sayan.jpg') }}" alt="Smoothie Super Sayan" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Super Sayan</h3>
                        <p>Mangue, coco, gingembre frais et sundae</p>
                    </div>
                </div>
            </div>

            <div class="photo-strip">
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/SMOOTHIE/Super%20Sayan.jpg') }}" alt="Super Sayan" loading="lazy">
                    <span class="photo-label">Super Sayan</span>
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/SMOOTHIE/Red%20Forest2.jpg') }}" alt="Red Forest 2" loading="lazy">
                    <span class="photo-label">Red Forest</span>
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/SMOOTHIE/Ban_a%20Manga%202.jpg') }}" alt="Ban'a Manga 2" loading="lazy">
                    <span class="photo-label">Ban'a Manga</span>
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/SMOOTHIE/Sonic%20Boom%202.jpg') }}" alt="Sonic Boom 2" loading="lazy">
                    <span class="photo-label">Sonic Boom</span>
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/SMOOTHIE/Super%20Sayan%202.jpg') }}" alt="Super Sayan 2" loading="lazy">
                    <span class="photo-label">Super Sayan</span>
                </div>
            </div>
            @include('pages.menu.partials.download-carte-btn')
        </div>
    </section>

    {{-- ── BEER ── --}}
    <section class="category-section category-section-alt" id="beer">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x1F37A;</span>
                    BIÈRES
                </div>
                <h2 class="category-title">Bières bouteilles</h2>
                <p class="category-subtitle">Notre sélection</p>
                <p class="category-description">Bières en bouteille pour accompagner vos burgers.</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/BEER/Bouteilles/DSC09958.jpg') }}" alt="Bières bouteilles Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Bières bouteilles</h3>
                        <p>Servies bien fraîches au fût</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/BEER/Bouteilles/DSC09958.jpg') }}" alt="Bières en bouteille" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Bières bouteilles</h3>
                        <p>Sélection craft et internationales</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/BEER/Bouteilles/DSC09972.jpg') }}" alt="Bière bouteille" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Notre sélection</h3>
                        <p>IPA, Stout, Lager et bien plus</p>
                    </div>
                </div>
            </div>

            <div class="photo-strip">
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/BEER/DSC01191.jpg') }}" alt="Beer 1" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/BEER/DSC01226.jpg') }}" alt="Beer 2" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/BEER/DSC01236.jpg') }}" alt="Beer 3" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/BEER/Bouteilles/DSC09964.jpg') }}" alt="Bouteille 1" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/BEER/Bouteilles/DSC09968.jpg') }}" alt="Bouteille 2" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/BEER/Bouteilles/DSC09972.jpg') }}" alt="Bouteille 3" loading="lazy">
                </div>
            </div>
            @include('pages.menu.partials.download-carte-btn')
        </div>
    </section>

    {{-- ── COFFEESHOP ── --}}
    <section class="category-section" id="coffeeshop">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x2615;</span>
                    COFFEESHOP
                </div>
                <h2 class="category-title">Coffee shop</h2>
                <p class="category-subtitle">Nos classiques et spécialités</p>
                <p class="category-description">Expresso 2,00€ · Américain 2,20€ · Cappuccino 3,60€ · Macchiato 3,60€ · Mocha 3,90€ · Café Latte 3,60€ · Ice Latte 3,60€ · Chaï Latte 4,20€ · Thé Dammann 2,90€ · Chocolat Chaud 3,90€</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/COFFESHOP/EXPRESSO%20NOISETTE.jpg') }}" alt="Expresso noisette" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Espressos</h3>
                        <p>Noisette, vanille et classique</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/COFFESHOP/DSC09733%20(Caf%C3%A9%203).jpg') }}" alt="Café latté" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Lattés et cappuccinos</h3>
                        <p>Latté art et mousses onctueuses</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/COFFESHOP/DSC09788%20(truc%20long).jpg') }}" alt="Boisson chaude" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Boissons chaudes</h3>
                        <p>Chocolats chauds et thés premium</p>
                    </div>
                </div>
            </div>
            @include('pages.menu.partials.download-carte-btn')
        </div>
    </section>

    {{-- ── SOFT DRINKS ── --}}
    <section class="category-section category-section-alt" id="soft-drinks">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x1F964;</span>
                    SOFT DRINKS
                </div>
                <h2 class="category-title">Soft drinks</h2>
                <p class="category-subtitle">Sodas et boissons fraîches</p>
                <p class="category-description">Tous vos sodas préférés pour accompagner votre repas.</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/SOFT%20DRINKS/DSC00640.jpg') }}" alt="Soft drinks Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Sodas</h3>
                        <p>Coca-Cola, Fanta, Sprite et plus</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/SOFT%20DRINKS/DSC00656.jpg') }}" alt="Limonade maison" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Limonades maison</h3>
                        <p>Fraîches et artisanales</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/SOFT%20DRINKS/DSC00678.jpg') }}" alt="Jus frais" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Jus frais</h3>
                        <p>Pressés à la commande</p>
                    </div>
                </div>
            </div>

            <div class="photo-strip">
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/SOFT%20DRINKS/DSC00643.jpg') }}" alt="Soft 1" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/SOFT%20DRINKS/DSC00649.jpg') }}" alt="Soft 2" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/SOFT%20DRINKS/DSC00653.jpg') }}" alt="Soft 3" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/SOFT%20DRINKS/DSC00661.jpg') }}" alt="Soft 4" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/SOFT%20DRINKS/DSC00673.jpg') }}" alt="Soft 5" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/SOFT%20DRINKS/DSC00693.jpg') }}" alt="Soft 6" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/BOISSONS/SOFT%20DRINKS/DSC00697.jpg') }}" alt="Soft 7" loading="lazy">
                </div>
            </div>
            @include('pages.menu.partials.download-carte-btn')
        </div>
    </section>

</div>{{-- end panel-boissons --}}

{{-- ════════════════════════════════════════════
     LOCALISATION - GOOGLE MAPS
════════════════════════════════════════════ --}}
<section class="section location-section">
    <div class="location-info text-center">
        <h2>Prêt à déguster ?</h2>
        <p class="location-subtitle">Venez nous retrouver au coeur de Aéroville</p>
        <address class="location-address">
            30 Rue des Buissons<br>
            CC Westfield Aéroville<br>
            93290 Tremblay-en-France
        </address>
    </div>
    <div class="location-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2618.5!2d2.5220!3d48.9912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sFactory+%26+Co+A%C3%A9roville!5e0!3m2!1sfr!2sfr!4v1" width="100%" height="400" style="border:0;border-radius:1.5rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION AVIS - DYNAMIC REVIEWS
════════════════════════════════════════════ --}}
<section class="section reviews-section">
    <div class="container">
        <div class="reviews-header">
            <div>
                <h2>Ce que nos clients disent</h2>
                @if($averageRating > 0)
                    <div class="reviews-aggregate">
                        <span class="aggregate-rating">{{ number_format($averageRating, 1) }}</span>
                        <div>
                            <div class="aggregate-stars">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= round($averageRating))
                                        &#9733;
                                    @else
                                        &#9734;
                                    @endif
                                @endfor
                            </div>
                            <span class="aggregate-count">{{ $totalReviews }} avis Google</span>
                        </div>
                    </div>
                @endif
            </div>
            <a href="{{ route('avis') }}" class="btn btn-outline-pink">Voir tous les avis</a>
        </div>
        <div class="reviews-grid">
            @forelse($featuredReviews as $review)
                <div class="review-card">
                    <div class="review-stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <span>@if($i <= $review->rating)&#9733;@else&#9734;@endif</span>
                        @endfor
                    </div>
                    <p class="review-text">"{{ $review->content }}"</p>
                    <p class="review-author">
                        — {{ $review->author_name }}
                        @if($review->source)
                            <span style="font-weight: 400; font-size: 0.8rem; color: var(--text-light);">via {{ ucfirst($review->source) }}</span>
                        @endif
                    </p>
                </div>
            @empty
                <p class="text-center">Aucun avis pour le moment.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- JavaScript for Tab Navigation & Interactions --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tab switching
    const tabs = document.querySelectorAll('.menu-tab');
    const panels = document.querySelectorAll('.menu-tab-panel');

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            var target = this.getAttribute('data-tab');

            // Update active tab
            tabs.forEach(function(t) { t.classList.remove('active'); });
            this.classList.add('active');

            // Show target panel
            panels.forEach(function(p) { p.classList.remove('active'); });
            var targetPanel = document.getElementById('panel-' + target);
            if (targetPanel) {
                targetPanel.classList.add('active');
                // Scroll to top of panel smoothly
                targetPanel.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Scroll to categories button
    var scrollBtn = document.querySelector('.scroll-to-categories');
    if (scrollBtn) {
        scrollBtn.addEventListener('click', function() {
            var nav = document.getElementById('menu-tabs');
            if (nav) {
                nav.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

    // Handle anchor links — activate correct tab if URL has hash
    function activateTabFromHash() {
        var hash = window.location.hash.replace('#', '');
        if (!hash) {
            return;
        }

        var targetEl = document.getElementById(hash);
        if (!targetEl) {
            return;
        }

        // Find which panel contains this section
        var panel = targetEl.closest('.menu-tab-panel');
        if (panel) {
            var panelId = panel.id.replace('panel-', '');
            tabs.forEach(function(t) { t.classList.remove('active'); });
            panels.forEach(function(p) { p.classList.remove('active'); });

            var matchTab = document.querySelector('[data-tab="' + panelId + '"]');
            if (matchTab) {
                matchTab.classList.add('active');
            }
            panel.classList.add('active');

            setTimeout(function() {
                targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        }
    }

    activateTabFromHash();
    window.addEventListener('hashchange', activateTabFromHash);
});
</script>

@endsection
