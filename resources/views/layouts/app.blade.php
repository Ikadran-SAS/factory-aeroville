<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{-- ── Favicons ── --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <meta name="theme-color" content="#000000">

    {{-- ── SEO Meta ── --}}
    <title>{!! $__env->yieldContent('title', 'Factory & Co Aéroville – Restaurant Burger Tremblay-en-France') !!}</title>
    <meta name="description" content="{!! $__env->yieldContent('description', 'Factory & Co, restaurant burger, bagel et cheesecake à Aéroville à Tremblay-en-France. 30 Rue des Buissons. Ouvert 7j/7.') !!}">
    <meta name="keywords"    content="{!! $__env->yieldContent('keywords', 'restaurant burger aéroville tremblay-en-france, factory and co tremblay-en-france, manger aéroville roissy') !!}">
    <link rel="canonical"    href="{{ $__env->yieldContent('canonical', url()->current()) }}">
    <meta name="robots"      content="@yield('robots', 'index, follow')">
    <meta name="geo.region"      content="FR-93">
    <meta name="geo.placename"   content="Tremblay-en-France, Ile-de-France">
    <meta name="geo.position"    content="48.9912;2.5220">
    <meta name="ICBM"            content="48.9912, 2.5220">

    {{-- ── Open Graph ── --}}
    <meta property="og:type"        content="restaurant">
    <meta property="og:site_name"   content="Factory & Co Aéroville">
    <meta property="og:title"       content="@yield('og_title', 'Factory & Co – Restaurant Burger Aéroville')">
    <meta property="og:description" content="@yield('og_description', 'Burgers, bagels et cheesecakes à Aéroville à Tremblay-en-France. 30 Rue des Buissons. Ouvert 7j/7.')">
    <meta property="og:image"       content="@yield('og_image', asset('images/og-factory-co.jpg'))">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:locale"      content="fr_FR">

    {{-- ── Twitter Card ── --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="@yield('og_title', 'Factory & Co Aéroville')">
    <meta name="twitter:description" content="@yield('og_description', 'Burgers, bagels et cheesecakes à Aéroville à Tremblay-en-France.')">
    <meta name="twitter:image"       content="@yield('og_image', asset('images/og-factory-co.jpg'))">

    {{-- ── JSON-LD Schema.org Restaurant (global) ── --}}
    @php
        $schemaData = [
            '@context' => 'https://schema.org',
            '@type' => 'Restaurant',
            'name' => 'Factory & Co Aéroville',
            'description' => 'Restaurant burger, bagel et cheesecake à Aéroville à Tremblay-en-France. Fast-casual américain, ouvert 7j/7.',
            'url' => url('/'),
            'telephone' => '0174257852',
            'email' => 'contact@factoryandco.com',
            'image' => asset('images/og-factory-co.jpg'),
            'logo' => asset('images/logo.png'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '30 Rue des Buissons, CC Westfield Aéroville',
                'addressLocality' => 'Tremblay-en-France',
                'postalCode' => '93290',
                'addressCountry' => 'FR'
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 48.9912,
                'longitude' => 2.5220
            ],
            'servesCuisine' => ['American', 'Burger', 'Bagel', 'Cheesecake', 'Fast Casual', 'Healthy'],
            'priceRange' => '€€',
            'acceptsReservations' => false,
            'hasMenu' => route('menu.index'),
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Sunday'],
                    'opens' => '08:30',
                    'closes' => '22:00'
                ],
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Friday', 'Saturday'],
                    'opens' => '08:30',
                    'closes' => '23:00'
                ]
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => '4.5',
                'reviewCount' => '6460',
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
    <script type="application/ld+json">{!! json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_AMP) !!}</script>

    {{-- ── JSON-LD page-specific ── --}}
    @stack('schema')

    {{-- ── Fonts ── --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- ── Vite Assets (CSS + JS) ── --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/modal-app.js'])

    {{-- ── Page-specific head ── --}}
    @stack('head')

    {{-- ── Google Consent Mode v2 ── --}}
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('consent', 'default', {
      'ad_storage': 'denied',
      'analytics_storage': 'denied',
      'ad_user_data': 'denied',
      'ad_personalization': 'denied',
      'wait_for_update': 500
    });
    </script>

    {{-- ── Google Tag Manager ── --}}
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PWLG649S');</script>
</head>
<body>

{{-- ── Google Tag Manager (noscript) ── --}}
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWLG649S"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

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

<div id="modal-app"></div>

{{-- ── Cookie Banner (Google Consent Mode v2) ── --}}
@include('layouts.partials.cookie-banner')

</body>
</html>
