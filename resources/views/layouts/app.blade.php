<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{-- ── SEO Meta ── --}}
    <title>{{ $__env->yieldContent('title', 'Factory & Co Val d\'Europe – Restaurant Burger Serris') }}</title>
    <meta name="description" content="{{ $__env->yieldContent('description', 'Factory & Co, restaurant burger, bagel et cheesecake à Val d\'Europe à Serris. 14 Rue du Danube. Ouvert 7j/7.') }}">
    <meta name="keywords"    content="{{ $__env->yieldContent('keywords', 'restaurant burger val d\'europe serris, factory and co serris, manger val d\'europe') }}">
    <link rel="canonical"    href="{{ $__env->yieldContent('canonical', url()->current()) }}">
    <meta name="robots"      content="@yield('robots', 'index, follow')">
    <meta name="geo.region"      content="FR-75">
    <meta name="geo.placename"   content="Serris, Île-de-France">
    <meta name="geo.position"    content="48.8753;2.7758">
    <meta name="ICBM"            content="43.6290, 1.3678">

    {{-- ── Open Graph ── --}}
    <meta property="og:type"        content="restaurant">
    <meta property="og:site_name"   content="Factory & Co Val d'Europe">
    <meta property="og:title"       content="@yield('og_title', 'Factory & Co – Restaurant Burger Val d\'Europe')">
    <meta property="og:description" content="@yield('og_description', 'Burgers, bagels et cheesecakes à Val d\'Europe à Serris. 14 Rue du Danube. Ouvert 7j/7.')">
    <meta property="og:image"       content="@yield('og_image', asset('images/og-factory-co.jpg'))">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:locale"      content="fr_FR">

    {{-- ── Twitter Card ── --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="@yield('og_title', 'Factory & Co Val d\'Europe')">
    <meta name="twitter:description" content="@yield('og_description', 'Burgers, bagels et cheesecakes à Val d\'Europe à Serris.')">
    <meta name="twitter:image"       content="@yield('og_image', asset('images/og-factory-co.jpg'))">

    {{-- ── JSON-LD Schema.org Restaurant (global) ── --}}
    @php
        $schemaData = [
            '@context' => 'https://schema.org',
            '@type' => 'Restaurant',
            'name' => 'Factory & Co Val d\'Europe',
            'description' => 'Restaurant burger, bagel et cheesecake à Val d\'Europe à Serris. Fast-casual américain, ouvert 7j/7.',
            'url' => url('/'),
            'telephone' => '+33561000000',
            'email' => 'contact@factoryandco.com',
            'image' => asset('images/og-factory-co.jpg'),
            'logo' => asset('images/logo.png'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '14 Rue du Danube, CC Val d\'Europe',
                'addressLocality' => 'Serris',
                'postalCode' => '77700',
                'addressCountry' => 'FR'
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 48.8753,
                'longitude' => 2.7758
            ],
            'servesCuisine' => ['American', 'Burger', 'Bagel', 'Cheesecake', 'Fast Casual', 'Healthy'],
            'priceRange' => '€€',
            'acceptsReservations' => false,
            'hasMenu' => route('menu.burgers'),
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday'],
                    'opens' => '07:00',
                    'closes' => '21:30'
                ],
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Thursday', 'Friday'],
                    'opens' => '07:00',
                    'closes' => '22:00'
                ],
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Saturday', 'Sunday'],
                    'opens' => '07:00',
                    'closes' => '22:30'
                ]
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => '4.5',
                'reviewCount' => '320',
                'bestRating' => '5'
            ],
            'amenityFeature' => [
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Accessible PMR', 'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Family Friendly', 'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'À emporter', 'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Halal', 'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Végétarien', 'value' => true]
            ],
            'sameAs' => ['https://www.instagram.com/factoryandco/', 'https://www.facebook.com/factoryandco/']
        ];
    @endphp
    <script type="application/ld+json">{!! json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>

    {{-- ── JSON-LD page-specific ── --}}
    @stack('schema')

    {{-- ── Fonts ── --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- ── Vite Assets (CSS + JS) ── --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- ── Page-specific head ── --}}
    @stack('head')
</head>
<body>

<div id="app">

    {{-- ── Topbar ── --}}
    @include('layouts.partials.topbar')

    {{-- ── Navbar ── --}}
    @include('layouts.partials.navbar')

    {{-- ── Main Content ── --}}
    <main role="main">
        @yield('content')
    </main>

    {{-- ── Footer ── --}}
    @include('layouts.partials.footer')

</div>{{-- /#app --}}

</body>
</html>
