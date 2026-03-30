@extends('layouts.app')

@section('title', 'Politique de Confidentialité – Factory & Co Aéroville')
@section('description', 'Découvrez notre politique de confidentialité et comment nous protégeons vos données personnelles chez Factory & Co.')
@section('keywords', 'politique de confidentialité, RGPD, protection des données, Factory & Co')

@section('content')

<nav class="breadcrumb">
    <div class="breadcrumb-inner">
        <a href="{{ route('home') }}">Accueil</a>
        <span class="bc-sep">›</span>
        <span>Politique de Confidentialité</span>
    </div>
</nav>

<div class="page-hero">
    <div class="page-hero-inner">
        <h1>Politique de Confidentialité</h1>
        <p>Nous respectons votre vie privée et nous nous engageons à protéger vos données personnelles.</p>
    </div>
</div>

<section class="section section-light">
    <div class="container">
        <div class="legal-content">
            <h2>1. Responsable du traitement</h2>
            <p>Factory & Co Aéroville<br>
            30 Rue des Buissons, CC Westfield Aéroville<br>
            93290 Tremblay-en-France<br>
            <a href="mailto:contact@factoryandco.com">contact@factoryandco.com</a></p>

            <h2>2. Données collectées</h2>
            <p>Nous collectons les données suivantes :</p>
            <ul>
                <li>Données de navigation via Google Analytics (adresse IP anonymisée, pages visitées, durée des visites)</li>
                <li>Données de marketing via Google Ads</li>
                <li>Données de cookies pour vos préférences de consentement</li>
                <li>Données de formulaires de contact (nom, email, message)</li>
            </ul>

            <h2>3. Consentement</h2>
            <p>Nous demandons votre consentement pour l'utilisation de cookies et le suivi analytics. Vous pouvez modifier vos préférences à tout moment via le gestionnaire de consentement.</p>

            <h2>4. Durée de conservation</h2>
            <p>Les cookies sont conservés pendant 365 jours. Les données de formulaire de contact sont conservées selon notre politique interne.</p>

            <h2>5. Vos droits</h2>
            <p>Vous avez le droit :</p>
            <ul>
                <li>D'accéder à vos données personnelles</li>
                <li>De les rectifier</li>
                <li>De les supprimer (droit à l'oubli)</li>
                <li>De vous opposer au traitement</li>
                <li>De porter plainte auprès de la CNIL</li>
            </ul>
            <p>Pour exercer ces droits, contactez-nous à <a href="mailto:contact@factoryandco.com">contact@factoryandco.com</a></p>

            <h2>6. Sécurité des données</h2>
            <p>Nous mettons en place des mesures de sécurité appropriées pour protéger vos données contre les accès non autorisés.</p>

            <h2>7. Modifications de la politique</h2>
            <p>Nous nous réservons le droit de modifier cette politique de confidentialité à tout moment. Les modifications seront notifiées sur cette page.</p>
        </div>
    </div>
</section>

@endsection

<style>
.legal-content {
    max-width: 800px;
    margin: 0 auto;
}

.legal-content h2 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: var(--navy);
}

.legal-content ul {
    margin-left: 1.5rem;
    margin-bottom: 1rem;
}

.legal-content ul li {
    list-style-type: disc;
    margin-bottom: 0.5rem;
}

.legal-content a {
    color: var(--pink-dark);
    text-decoration: underline;
}
</style>
