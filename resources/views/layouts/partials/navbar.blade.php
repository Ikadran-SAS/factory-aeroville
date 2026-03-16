<div x-data="{ mobileOpen: false, dropdownOpen: false }" class="navbar-wrapper">
    {{-- ── NAVBAR PRINCIPALE ── --}}
    <header class="navbar-modern">
        <div class="navbar-container">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="navbar-logo">
                <img src="{{ asset('images/logo-fact.svg') }}" alt="Factory & Co" height="32" width="auto">
            </a>

            {{-- Navigation desktop --}}
            <nav class="navbar-menu">
                <a href="{{ route('home') }}" @class(['navbar-link', 'navbar-link-active' => request()->routeIs('home')])>
                    Accueil
                </a>
                <a href="{{ route('menu.burgers') }}" @class(['navbar-link', 'navbar-link-active' => request()->routeIs('menu.*')])>
                    La carte
                </a>
                <a href="{{ route('home') }}#concept" class="navbar-link">
                    Notre concept
                </a>
                <a href="{{ route('home') }}#specialites" class="navbar-link">
                    Nos spécialités
                </a>
                <a href="{{ route('home') }}#avis" class="navbar-link">
                    Avis
                </a>
                <a href="{{ route('blog.index') }}" @class(['navbar-link', 'navbar-link-active' => request()->routeIs('blog.*')])>
                    Le blog
                </a>
            </nav>

            {{-- Right side CTA --}}
            <div class="navbar-actions">
                <button class="navbar-geoloc" @click="window.factoryCoNav && window.factoryCoNav.openNavigationModal()" type="button" aria-label="Localisation">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </button>
                <button class="navbar-toggle" @click="mobileOpen = !mobileOpen" type="button" aria-label="Menu">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Divider --}}
        <div class="navbar-divider"></div>
    </header>

    {{-- Overlay --}}
    <div class="navbar-overlay" x-show="mobileOpen" @click="mobileOpen = false" x-transition></div>

    {{-- Menu mobile sidebar --}}
    <nav class="navbar-mobile" x-show="mobileOpen" x-transition.origin.right>
        <button class="navbar-mobile-close" @click="mobileOpen = false" type="button" aria-label="Fermer le menu">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <a href="{{ route('home') }}" @click="mobileOpen = false" @class(['navbar-mobile-link', 'active' => request()->routeIs('home')])>Accueil</a>
        <a href="{{ route('menu.burgers') }}" @click="mobileOpen = false" @class(['navbar-mobile-link', 'active' => request()->routeIs('menu.*')])>La carte</a>
        <a href="{{ route('home') }}#concept" @click="mobileOpen = false" class="navbar-mobile-link">Notre concept</a>
        <a href="{{ route('home') }}#specialites" @click="mobileOpen = false" class="navbar-mobile-link">Nos spécialités</a>
        <a href="{{ route('home') }}#avis" @click="mobileOpen = false" class="navbar-mobile-link">Avis</a>
        <a href="{{ route('blog.index') }}" @click="mobileOpen = false" @class(['navbar-mobile-link', 'active' => request()->routeIs('blog.*')])>Le blog</a>
    </nav>
</div>
