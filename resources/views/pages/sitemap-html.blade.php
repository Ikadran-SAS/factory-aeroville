@extends('layouts.app')
@section('title', 'Plan du site – Factory & Co')
@section('description', 'Accédez facilement à toutes les pages du site Factory & Co Aéroville')
@section('canonical', route('sitemap.html'))

@section('content')
<nav class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Accueil</a><span class="bc-sep">›</span><span>Plan du site</span></div></nav>

<div class="page-hero">
    <div class="page-hero-inner">
        <span class="section-tag">Navigation complète</span>
        <h1>Plan du site</h1>
        <p>Retrouvez facilement tous les accès et ressources disponibles sur Factory & Co.</p>
    </div>
</div>

<section class="section section-light">
    <div class="container">
        <div class="sitemap-wrapper">
            <div class="sitemap-intro">
                <p>Bienvenue sur le plan du site de Factory & Co Aéroville. Vous trouverez ci-dessous l'ensemble des pages et ressources du site, organisées par catégorie pour faciliter votre navigation.</p>
            </div>

            <div class="sitemap-grid">
                {{-- Section Pages principales --}}
                <div class="sitemap-section">
                    <h2 class="sitemap-title">Pages principales</h2>
                    <ul class="sitemap-list">
                        @foreach($routes as $route)
                            @if(in_array($route['title'], ['Accueil', 'La carte', 'Notre concept']))
                                <li class="sitemap-item">
                                    <a href="{{ $route['url'] }}" class="sitemap-link">
                                        <span class="sitemap-link-title">{{ $route['title'] }}</span>
                                        <span class="sitemap-link-desc">{{ $route['description'] }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                {{-- Section Découvrir --}}
                <div class="sitemap-section">
                    <h2 class="sitemap-title">Découvrir</h2>
                    <ul class="sitemap-list">
                        @foreach($routes as $route)
                            @if(in_array($route['title'], ['Nos spécialités', 'Avis clients', 'Click & Collect']))
                                <li class="sitemap-item">
                                    <a href="{{ $route['url'] }}" class="sitemap-link">
                                        <span class="sitemap-link-title">{{ $route['title'] }}</span>
                                        <span class="sitemap-link-desc">{{ $route['description'] }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                {{-- Section Aide & Contact --}}
                <div class="sitemap-section">
                    <h2 class="sitemap-title">Aide & Contact</h2>
                    <ul class="sitemap-list">
                        @foreach($routes as $route)
                            @if(in_array($route['title'], ['FAQ', 'Contact']))
                                <li class="sitemap-item">
                                    <a href="{{ $route['url'] }}" class="sitemap-link">
                                        <span class="sitemap-link-title">{{ $route['title'] }}</span>
                                        <span class="sitemap-link-desc">{{ $route['description'] }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                {{-- Section Légal --}}
                <div class="sitemap-section">
                    <h2 class="sitemap-title">Légal</h2>
                    <ul class="sitemap-list">
                        @foreach($routes as $route)
                            @if(in_array($route['title'], ['Mentions légales', 'Politique de confidentialité', 'Conditions d\'utilisation']))
                                <li class="sitemap-item">
                                    <a href="{{ $route['url'] }}" class="sitemap-link">
                                        <span class="sitemap-link-title">{{ $route['title'] }}</span>
                                        <span class="sitemap-link-desc">{{ $route['description'] }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section section-dark">
    <div class="container">
        <div class="cta-block">
            <h2>Des questions ?</h2>
            <p>Notre équipe est disponible pour vous aider.</p>
            <a href="{{ route('contact') }}" class="btn btn-pink">Nous contacter</a>
        </div>
    </div>
</section>

<style>
.sitemap-wrapper {
    max-width: 1000px;
    margin: 0 auto;
}

.sitemap-intro {
    text-align: center;
    margin-bottom: 3rem;
    padding: 2rem;
    background: rgba(245, 195, 219, 0.05);
    border-radius: 0.75rem;
}

.sitemap-intro p {
    font-size: 1rem;
    line-height: 1.6;
    color: #666;
    margin: 0;
}

.sitemap-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2.5rem;
    margin-bottom: 3rem;
}

.sitemap-section {
    background: #fff;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.75rem;
    padding: 2rem;
    transition: all 0.3s ease;
}

.sitemap-section:hover {
    border-color: var(--pink-dark);
    box-shadow: 0 4px 12px rgba(245, 195, 219, 0.15);
}

.sitemap-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--navy);
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--pink-dark);
}

.sitemap-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sitemap-item {
    margin-bottom: 1.25rem;
}

.sitemap-item:last-child {
    margin-bottom: 0;
}

.sitemap-link {
    flex: 1;
    text-decoration: none;
    transition: all 0.3s ease;
}

.sitemap-link-title {
    display: block;
    font-weight: 600;
    color: var(--navy);
    font-size: 1rem;
    margin-bottom: 0.3rem;
}

.sitemap-link:hover .sitemap-link-title {
    color: var(--pink-dark);
}

.sitemap-link-desc {
    display: block;
    font-size: 0.85rem;
    color: #888;
    line-height: 1.4;
}


@media (max-width: 1024px) {
    .sitemap-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width: 768px) {
    .sitemap-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .sitemap-section {
        padding: 1.5rem;
    }

    .sitemap-title {
        font-size: 1.1rem;
    }

    .sitemap-item {
        flex-direction: column;
    }

    .sitemap-priority {
        align-self: flex-start;
    }

    .sitemap-xml-section {
        padding: 2rem 1.5rem;
    }

    .sitemap-intro {
        padding: 1.5rem;
    }
}
</style>
@endsection
