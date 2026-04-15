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
                    ['@type' => 'MenuSection', 'name' => 'Plateau à partager', 'description' => 'Plateaux gourmands à partager entre amis', 'position' => 5],
                    ['@type' => 'MenuSection', 'name' => 'Menu kids', 'description' => 'Menus pour les enfants', 'position' => 6],
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
                <p class="category-subtitle">Buns briochés fabriqués en atelier, certifiés halal</p>
                <p class="category-description">Garnis d'un steak de bœuf Angus smashé et grillé, ou d'un poulet mariné 12h, grillé ou frit dans notre panure secrète ultra croustillante.</p>
            </div>

            {{-- Product cards from database --}}
            <div class="items-grid">
                @forelse ($burgers as $subcategory => $items)
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
                    <p class="text-center">Aucun burger disponible</p>
                @endforelse
            </div>
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
                <p class="category-description"></p>
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
                <h2 class="category-title">Accompagnements</h2>
                <p class="category-subtitle">Frites crinkle, onion rings et dips gourmands</p>
                <p class="category-description">Parce qu'un bon burger mérite les meilleurs à-côtés.</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/SIDES/DSC00840.jpg') }}" alt="Frites crinkle Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Frites crinkle</h3>
                        <p>Croustillantes et gourmandes</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/SIDES/DSC00879.jpg') }}" alt="Onion rings" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Onion rings et dips</h3>
                        <p>Croustillants et irrésistibles</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/SIDES/DSC00904.jpg') }}" alt="Sides assortis" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Les classiques</h3>
                        <p>Cheese fries, nuggets et plus encore</p>
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
        </div>
    </section>

    {{-- ── PLATEAU A PARTAGER ── --}}
    <section class="category-section" id="plateau">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x1F37D;&#xFE0F;</span>
                    PLATEAU A PARTAGER
                </div>
                <h2 class="category-title">À partager entre amis</h2>
                <p class="category-subtitle">Idéal pour les grandes tablées</p>
                <p class="category-description">Nos plateaux généreux rassemblent le meilleur de Factory & Co pour des moments de convivialité inoubliables.</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/PLATEAU%20%C3%80%20PARTAGER/DSC01329.jpg') }}" alt="Plateau à partager Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Le grand plateau</h3>
                        <p>Burgers, sides et dips pour toute la table</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/PLATEAU%20%C3%80%20PARTAGER/DSC01336.jpg') }}" alt="Plateau gourmand" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Plateau gourmand</h3>
                        <p>Un assortiment de nos meilleurs plats</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/PLATEAU%20%C3%80%20PARTAGER/DSC01342.jpg') }}" alt="Plateau convivial" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Plateau convivial</h3>
                        <p>Parfait pour un apéritif entre amis</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── MENU KIDS ── --}}
    <section class="category-section category-section-alt" id="kids">
        <div class="container">
            <div class="category-hero">
                <div class="category-badge">
                    <span class="badge-icon">&#x1F476;</span>
                    MENU KIDS
                </div>
                <h2 class="category-title">Pour les petits aventuriers</h2>
                <p class="category-subtitle">Des menus adaptés aux enfants, savoureux et équilibrés</p>
                <p class="category-description">Nos menus enfants sont pensés pour ravir les petits gourmands avec des portions adaptées et des ingrédients de qualité.</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/MENU%20KIDS/DSC01282.jpg') }}" alt="Menu kids Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Menu kids burger</h3>
                        <p>Mini burger, frites et boisson</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/MENU%20KIDS/DSC01296.jpg') }}" alt="Menu enfant" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Menu kids nuggets</h3>
                        <p>Nuggets maison, frites et boisson</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SAL%C3%89/MENU%20KIDS/DSC01303.jpg') }}" alt="Menu kids dessert" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Menu kids complet</h3>
                        <p>Plat, frites, boisson et dessert</p>
                    </div>
                </div>
            </div>

            <div class="photo-strip">
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SAL%C3%89/MENU%20KIDS/DSC01283.jpg') }}" alt="Kids 1" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SAL%C3%89/MENU%20KIDS/DSC01284.jpg') }}" alt="Kids 2" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SAL%C3%89/MENU%20KIDS/DSC01289.jpg') }}" alt="Kids 3" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SAL%C3%89/MENU%20KIDS/DSC01292.jpg') }}" alt="Kids 4" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SAL%C3%89/MENU%20KIDS/DSC01299.jpg') }}" alt="Kids 5" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SAL%C3%89/MENU%20KIDS/DSC01302.jpg') }}" alt="Kids 6" loading="lazy">
                </div>
            </div>
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
                <h2 class="category-title">Douceurs sucrées</h2>
                <p class="category-subtitle">Cookies, pâtisseries artisanales et gourmandises</p>
                <p class="category-description">Des desserts faits maison pour conclure votre repas en beauté. Nos cookies sont cuits sur place, dorés et fondants.</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/Factory%20x%20Plateforme%20026.JPG') }}" alt="Desserts Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Pâtisseries maison</h3>
                        <p>Créations gourmandes du jour</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/COOKIES/DSC00391.jpg') }}" alt="Cookies Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Cookies</h3>
                        <p>Cuits sur place, fondants à souhait</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/Factory%20x%20Social%20Media%204.JPG') }}" alt="Dessert gourmand" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Nos créations</h3>
                        <p>Brownies, muffins et douceurs variées</p>
                    </div>
                </div>
            </div>

            <div class="photo-strip">
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/Factory%20x%20Plateforme%20027.JPG') }}" alt="Dessert 1" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/Factory%20x%20Plateforme%20030.JPG') }}" alt="Dessert 2" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/Factory%20x%20Plateforme%20031.JPG') }}" alt="Dessert 3" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/Factory%20x%20Social%20Media%205.JPG') }}" alt="Dessert 4" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/Factory%20x%20Social%20Media%206.JPG') }}" alt="Dessert 5" loading="lazy">
                </div>
                <div class="photo-strip-item">
                    <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/COOKIES/DSC00411.jpg') }}" alt="Cookies" loading="lazy">
                </div>
            </div>
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
                <h2 class="category-title">Formules petit-déjeuner</h2>
                <p class="category-subtitle">Dès 8h30, le meilleur du brunch new-yorkais</p>
                <p class="category-description">Commencez votre journée avec nos formules breakfast généreuses. Pancakes, granola, fruits frais et bien plus.</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SUCR%C3%89/BREAKFAST/DSC01073.jpg') }}" alt="Breakfast Factory and Co" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Brunch complet</h3>
                        <p>Pancakes, fruits frais et boisson chaude</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SUCR%C3%89/BREAKFAST/DSC01092.jpg') }}" alt="Petit déjeuner sucré" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Formule sucrée</h3>
                        <p>Granola, yaourt et fruits de saison</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/SUCR%C3%89/BREAKFAST/DSC01094.jpg') }}" alt="Breakfast gourmand" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Le gourmand</h3>
                        <p>Notre formule la plus complète</p>
                    </div>
                </div>
            </div>
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
                <h2 class="category-title">Milkshakes onctueux</h2>
                <p class="category-subtitle">Glace artisanale, lait frais et toppings gourmands</p>
                <p class="category-description">Nos milkshakes sont préparés avec de la vraie glace artisanale. Classiques, fruités ou ultra-gourmands, il y en a pour tous les goûts.</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01318.jpg') }}" alt="Milkshake classique" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Milkshakes classiques</h3>
                        <p>Vanille, chocolat, fraise</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01351.jpg') }}" alt="Milkshake gourmand" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Milkshakes gourmands</h3>
                        <p>Oreo, Kinder, Spéculoos</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01377.jpg') }}" alt="Milkshake fruité" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Milkshakes fruités</h3>
                        <p>Fruits frais mixés avec de la glace</p>
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
                <h2 class="category-title">Smoothies vitaminés</h2>
                <p class="category-subtitle">Fruits frais, sans sucre ajouté</p>
                <p class="category-description">Nos smoothies sont mixés à la commande avec des fruits frais de saison. Énergie et saveurs à chaque gorgée.</p>
            </div>

            <div class="subcategory-gallery">
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/SMOOTHIE/Red%20Forest.jpg') }}" alt="Smoothie Red Forest" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Red Forest</h3>
                        <p>Fruits rouges et baies sauvages</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/SMOOTHIE/Ban_a%20Manga.jpg') }}" alt="Smoothie Ban'a Manga" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Ban'a Manga</h3>
                        <p>Banane et mangue tropicale</p>
                    </div>
                </div>
                <div class="subcategory-card">
                    <img src="{{ asset('menu/BOISSONS/SMOOTHIE/Sonic%20Boom.jpg') }}" alt="Smoothie Sonic Boom" loading="lazy">
                    <div class="subcategory-card-overlay">
                        <h3>Sonic Boom</h3>
                        <p>Le boost d'énergie ultime</p>
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
                <p class="category-subtitle">Pression et bouteilles, sélection craft</p>
                <p class="category-description">Une sélection de bières en bouteille pour accompagner vos burgers.</p>
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
                <h2 class="category-title">Notre coffeeshop</h2>
                <p class="category-subtitle">Espressos, lattés et boissons chaudes</p>
                <p class="category-description">Un vrai coffee shop à l'américaine. Expresso, cappuccino, latté art et boissons chaudes réconfortantes.</p>
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
                <h2 class="category-title">Boissons fraîches</h2>
                <p class="category-subtitle">Sodas, jus frais et boissons maison</p>
                <p class="category-description">Limonades artisanales, thés glacés maison, jus frais pressés et tous vos sodas préférés.</p>
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
                    <div class="review-stars">{!! $review->stars_html !!}</div>
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
