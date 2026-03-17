@extends('layouts.app')

@section('title', 'Avis Clients | Factory & Co – Nos Clients Témoignent')
@section('description', 'Découvrez les avis vérifiés de nos clients satisfaits. 4.8★ - Plus de 500 avis positifs. Factory & Co Val d\'Europe.')
@section('keywords', 'avis clients factory co, témoignages factory co, avis burgers serris, reviews factory and co')

@section('content')

{{-- BREADCRUMB --}}
<nav class="breadcrumb">
    <div class="breadcrumb-inner">
        <a href="{{ route('home') }}">Accueil</a>
        <span class="bc-sep">›</span>
        <span>Avis Clients</span>
    </div>
</nav>

{{-- HERO SECTION --}}
<section class="avis-hero">
    <div class="avis-hero-overlay"></div>
    <div class="avis-hero-content">
        <span class="section-tag">⭐ CE QUE NOS CLIENTS DISENT</span>
        <h1>Pourquoi ils nous<br><em>ont choisi</em></h1>
        <p>Découvrez pourquoi les clients de Factory & Co nous font confiance</p>

        <div class="avis-trust-metrics">
            <div class="reviews-stars">★★★★★</div>
            <div class="reviews-score">4.8 <span>/5 · +500 avis vérifiés</span></div>
        </div>
    </div>
</section>

{{-- TESTIMONIALS GRID --}}
<section class="avis-section">
    <div class="container">
        <div class="reviews-grid-clean">
            <div class="review-card-clean">
                <div class="review-card-header-clean">
                    <div class="review-avatar-clean">JM</div>
                    <div class="review-info-clean">
                        <h4>Jean-Marc D.</h4>
                        <p class="review-time">Il y a 2 semaines</p>
                    </div>
                    <svg class="google-logo-clean" viewBox="0 0 24 24" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"></path><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path></svg>
                </div>
                <div class="review-stars-clean">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="review-text-clean">J'ai essayé les burgers de Factory & Co et c'est tout simplement délicieux. La viande est de qualité, les garnitures fraîches, et l'équipe toujours souriante.</p>
            </div>

            <div class="review-card-clean">
                <div class="review-card-header-clean">
                    <div class="review-avatar-clean">SL</div>
                    <div class="review-info-clean">
                        <h4>Sandrine L.</h4>
                        <p class="review-time">Il y a 3 semaines</p>
                    </div>
                    <svg class="google-logo-clean" viewBox="0 0 24 24" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"></path><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path></svg>
                </div>
                <div class="review-stars-clean">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="review-text-clean">Les bagels de Factory & Co sont parfaits pour un petit-déj en famille. Les enfants adorent, c'est sain, et c'est frais!</p>
            </div>

            <div class="review-card-clean">
                <div class="review-card-header-clean">
                    <div class="review-avatar-clean">MV</div>
                    <div class="review-info-clean">
                        <h4>Marie V.</h4>
                        <p class="review-time">Il y a 1 mois</p>
                    </div>
                    <svg class="google-logo-clean" viewBox="0 0 24 24" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"></path><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path></svg>
                </div>
                <div class="review-stars-clean">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="review-text-clean">J'ai goûté du cheesecake un peu partout, et celui de Factory & Co est vraiment exceptionnel. Texture crémeuse, recette authentique.</p>
            </div>

            <div class="review-card-clean">
                <div class="review-card-header-clean">
                    <div class="review-avatar-clean">TP</div>
                    <div class="review-info-clean">
                        <h4>Thierry P.</h4>
                        <p class="review-time">Il y a 1 mois</p>
                    </div>
                    <svg class="google-logo-clean" viewBox="0 0 24 24" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"></path><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path></svg>
                </div>
                <div class="review-stars-clean">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>
                </div>
                <p class="review-text-clean">En tant que vegan, je suis ravi d'avoir un endroit où je peux manger de bons burgers et bowls sans compromis. Le personnel est attentif.</p>
            </div>

            <div class="review-card-clean">
                <div class="review-card-header-clean">
                    <div class="review-avatar-clean">CJ</div>
                    <div class="review-info-clean">
                        <h4>Céline J.</h4>
                        <p class="review-time">Il y a 2 semaines</p>
                    </div>
                    <svg class="google-logo-clean" viewBox="0 0 24 24" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"></path><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path></svg>
                </div>
                <div class="review-stars-clean">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="review-text-clean">Factory & Co est devenu mon incontournable pour la pause déjeuner. Service rapide, food de qualité, lieu agréable. Les prix sont justes.</p>
            </div>

            <div class="review-card-clean">
                <div class="review-card-header-clean">
                    <div class="review-avatar-clean">AM</div>
                    <div class="review-info-clean">
                        <h4>Antoine M.</h4>
                        <p class="review-time">Il y a 3 semaines</p>
                    </div>
                    <svg class="google-logo-clean" viewBox="0 0 24 24" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"></path><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path></svg>
                </div>
                <div class="review-stars-clean">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="review-text-clean">Factory & Co apporte une vraie dimension "street food premium" à Val d'Europe. Ingrédients frais, préparation soignée, saveurs authentiques.</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA SECTION --}}
<section class="section section-light" id="faq">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag">Questions ?</span>
            <h2 class="section-title dark">Questions fréquentes</h2>
        </div>
        {{-- Accordéon FAQs avec Vue --}}
        <div id="faq-accordion-app" data-faqs="{{ base64_encode(json_encode($faqs ?? [])) }}"></div>
        <div class="faq-cta text-center">
            <p>Vous avez d'autres questions ?</p>
            <a href="{{ route('contact') }}" class="btn btn-outline-pink">Nous contacter</a>
        </div>
    </div>
</section>

{{-- NEWSLETTER SECTION --}}
<section class="section section-dark newsletter-section">
    <div class="container">
        <div class="newsletter-content">
            <h2>Restez connecté</h2>
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
