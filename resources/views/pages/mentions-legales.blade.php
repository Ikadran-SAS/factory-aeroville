@extends('layouts.app')

@section('title', 'Mentions Légales – Factory & Co Aéroville')
@section('description', 'Mentions légales et informations éditoriales de Factory & Co Aéroville. Découvrez les responsabilités légales et les informations sur l\'entreprise.')
@section('keywords', 'mentions légales, informations légales, Factory & Co, éditeur du site')

@push('schema')
@php
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => route('home')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Mentions légales', 'item' => route('mentions-legales')]
        ]
    ];
    $webPageSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebPage',
        '@id' => route('mentions-legales'),
        'url' => route('mentions-legales'),
        'name' => 'Mentions Légales – Factory & Co Aéroville',
        'isPartOf' => ['@id' => route('home')],
        'breadcrumb' => ['@id' => '#breadcrumb']
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($webPageSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

<nav class="breadcrumb">
    <div class="breadcrumb-inner">
        <a href="{{ route('home') }}">Accueil</a>
        <span class="bc-sep">›</span>
        <span>Mentions Légales</span>
    </div>
</nav>

<div class="page-hero">
    <div class="page-hero-inner">
        <h1>Mentions Légales</h1>
        <p>Informations légales et éditoriales relatives au site Factory & Co Aéroville</p>
    </div>
</div>

<section class="section section-light">
    <div class="container">
        <div class="legal-content">
            <h2>1. Identification de l'éditeur</h2>
            <p><strong>Raison sociale :</strong> Factory & Co Aéroville<br>
            <strong>Statut juridique :</strong> Entreprise commerciale<br>
            <strong>Adresse :</strong> 30 Rue des Buissons, Centre Commercial Westfield Aéroville<br>
            93290 Tremblay-en-France, France<br>
            <strong>Téléphone :</strong> <a href="tel:+33174257852">+33 1 74 25 78 52</a><br>
            <strong>Email :</strong> <a href="mailto:contact@factoryandco.com">contact@factoryandco.com</a></p>

            <h2>2. Responsable de la publication</h2>
            <p>Le présent site est édité par Factory & Co Aéroville. Le responsable de la publication est la direction générale de l'entreprise.</p>

            <h2>3. Hébergement du site</h2>
            <p><strong>Nom de l'hébergeur :</strong> [À compléter avec les informations d'hébergement]<br>
            <strong>Adresse :</strong> [À compléter avec l'adresse de l'hébergeur]</p>

            <h2>4. Conditions d'utilisation</h2>
            <p>Le présent site est mis à disposition gratuitement. L'accès et l'utilisation de ce site est soumis aux conditions suivantes :</p>
            <ul>
                <li>Les utilisateurs s'engagent à respecter les lois et réglementations en vigueur en France</li>
                <li>Toute reproduction, distribution ou transmission des contenus du site est interdite sans autorisation préalable</li>
                <li>Les utilisateurs ne doivent pas utiliser le site pour des activités illégales ou nuisibles</li>
                <li>Factory & Co se réserve le droit de supprimer tout contenu contraire à ces conditions</li>
            </ul>

            <h2>5. Propriété intellectuelle</h2>
            <p>Tous les contenus du site (textes, images, logos, éléments graphiques) sont protégés par les droits d'auteur et les droits de propriété intellectuelle. Toute reproduction sans autorisation est strictement interdite.</p>
            <p>Les droits d'auteur du site et de ses contenus sont la propriété de Factory & Co Aéroville.</p>

            <h2>6. Responsabilité</h2>
            <p>Factory & Co Aéroville s'efforce de fournir des informations précises et à jour sur son site. Cependant, nous ne pouvons pas garantir :</p>
            <ul>
                <li>L'absence d'erreurs ou d'omissions</li>
                <li>La disponibilité permanente du site</li>
                <li>L'absence de virus ou de contenu nuisible</li>
            </ul>
            <p>Factory & Co Aéroville ne peut être tenue responsable des dommages directs ou indirects résultant de l'utilisation du site.</p>

            <h2>7. Liens externes</h2>
            <p>Le site peut contenir des liens vers des sites externes. Factory & Co Aéroville n'est pas responsable du contenu de ces sites tiers et ne peut être tenue responsable de tout dommage résultant de leur accès ou utilisation.</p>

            <h2>8. Données personnelles et cookies</h2>
            <p>Pour plus d'informations sur la collecte, l'utilisation et la protection de vos données personnelles, veuillez consulter notre <a href="{{ route('confidentialite') }}">politique de confidentialité</a>.</p>

            <h2>9. Modifications</h2>
            <p>Factory & Co Aéroville se réserve le droit de modifier à tout moment les présentes mentions légales. Les modifications seront effectives dès leur mise en ligne. Il est de votre responsabilité de consulter régulièrement ces mentions légales.</p>

            <h2>10. Contact</h2>
            <p>Pour toute question concernant le site ou les présentes mentions légales, vous pouvez nous contacter :</p>
            <ul>
                <li>Par email : <a href="mailto:contact@factoryandco.com">contact@factoryandco.com</a></li>
                <li>Par téléphone : <a href="tel:+33174257852">+33 1 74 25 78 52</a></li>
                <li>Par courrier : 30 Rue des Buissons, 93290 Tremblay-en-France, France</li>
            </ul>
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
