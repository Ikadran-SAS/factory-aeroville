{{-- ── NAVBAR PRINCIPALE ── --}}
<header class="navbar" x-data="{ mobileOpen: false }">
    <div class="navbar-inner">
        <a href="{{ route('home') }}" class="logo">Factory <span>&amp;</span> Co</a>

        {{-- Navigation desktop --}}
        <ul class="nav-links">
            <li>
                <a href="{{ route('home') }}" @class(['active' => request()->routeIs('home')])>
                    Accueil
                </a>
            </li>
            <li class="nav-dropdown">
                <a href="{{ route('menu.burgers') }}" @class(['active' => request()->routeIs('menu.*')])>
                    Notre Carte ▾
                </a>
                <div class="nav-dropdown-menu">
                    <a href="{{ route('menu.burgers') }}"    @class(['active' => request()->routeIs('menu.burgers')])>🍔 L'Atelier Burger</a>
                    <a href="{{ route('menu.bagels') }}"     @class(['active' => request()->routeIs('menu.bagels')])>🥯 Bagels New-Yorkais</a>
                    <a href="{{ route('menu.cheesecake') }}" @class(['active' => request()->routeIs('menu.cheesecake')])>🍰 Cheesecake Factory</a>
                    <a href="{{ route('menu.bowls') }}"      @class(['active' => request()->routeIs('menu.bowls')])>🥗 Healthy &amp; Bowls</a>
                </div>
            </li>
            <li><a href="{{ route('click-collect') }}" @class(['active' => request()->routeIs('click-collect')])>Click &amp; Collect</a></li>
            <li><a href="{{ route('blog.index') }}"     @class(['active' => request()->routeIs('blog.*')])>Blog</a></li>
            <li><a href="{{ route('faq') }}"            @class(['active' => request()->routeIs('faq')])>FAQ</a></li>
            <li><a href="{{ route('contact') }}"        @class(['active' => request()->routeIs('contact')])>Contact</a></li>
        </ul>

        <a href="{{ route('click-collect') }}" class="nav-cta">Commander</a>

        {{-- Burger menu mobile --}}
        <button class="nav-mobile-toggle" @click="mobileOpen = !mobileOpen" aria-label="Menu">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="24" height="24">
                <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="mobileOpen"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Menu mobile --}}
    <div class="nav-mobile" x-show="mobileOpen" x-transition>
        <a href="{{ route('home') }}">Accueil</a>
        <a href="{{ route('menu.burgers') }}">🍔 Burgers</a>
        <a href="{{ route('menu.bagels') }}">🥯 Bagels</a>
        <a href="{{ route('menu.cheesecake') }}">🍰 Cheesecake</a>
        <a href="{{ route('menu.bowls') }}">🥗 Bowls</a>
        <a href="{{ route('click-collect') }}">Click &amp; Collect</a>
        <a href="{{ route('blog.index') }}">Blog</a>
        <a href="{{ route('faq') }}">FAQ</a>
        <a href="{{ route('contact') }}">Contact</a>
    </div>
</header>
