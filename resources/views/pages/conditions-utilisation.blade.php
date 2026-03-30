@extends('layouts.app')

@section('title', 'Conditions d\'Utilisation – Factory & Co Aéroville')
@section('description', 'Conditions d\'utilisation du site Factory & Co Aéroville. Consultez nos règles et obligations pour l\'utilisation de nos services.')
@section('keywords', 'conditions d\'utilisation, conditions d\'usage, Factory & Co, termes de service')

@section('content')

<nav class="breadcrumb">
    <div class="breadcrumb-inner">
        <a href="{{ route('home') }}">Accueil</a>
        <span class="bc-sep">›</span>
        <span>Conditions d'Utilisation</span>
    </div>
</nav>

<div class="page-hero">
    <div class="page-hero-inner">
        <h1>Conditions d'Utilisation</h1>
        <p>Consultez les règles et conditions régissant l'utilisation du site Factory & Co Aéroville</p>
    </div>
</div>

<section class="section section-light">
    <div class="container">
        <div class="legal-content">
            <h2>1. Objet des conditions d'utilisation</h2>
            <p>Les présentes conditions d'utilisation régissent l'accès et l'utilisation du site web Factory & Co Aéroville. En accédant à ce site, vous acceptez de vous conformer à ces conditions. Si vous n'acceptez pas ces conditions, veuillez ne pas accéder au site.</p>

            <h2>2. Accès au site</h2>
            <p>Factory & Co Aéroville s'efforce de maintenir le site accessible 24h/24. Cependant, nous nous réservons le droit de :</p>
            <ul>
                <li>Modifier ou interrompre l'accès au site temporairement ou définitivement, avec ou sans préavis</li>
                <li>Refuser l'accès à tout utilisateur qui viole ces conditions</li>
                <li>Effectuer des maintenances techniques sans préavis</li>
            </ul>

            <h2>3. Restrictions d'utilisation</h2>
            <p>Vous acceptez de ne pas utiliser le site pour :</p>
            <ul>
                <li>Transmettre du contenu illégal, offensant ou nuisible</li>
                <li>Effectuer des attaques informatiques ou tenter de compromettre la sécurité</li>
                <li>Télécharger ou propager des virus ou logiciels malveillants</li>
                <li>Harceler, intimider ou menacer d'autres utilisateurs</li>
                <li>Violer les droits d'auteur ou propriété intellectuelle</li>
                <li>Utiliser des robots, scrapers ou outils d'extraction de données</li>
                <li>Envoyer du contenu spam ou de la publicité non sollicitée</li>
                <li>Contrefaire ou usurper l'identité d'une personne ou entreprise</li>
            </ul>

            <h2>4. Contenu utilisateur</h2>
            <p>Si vous soumettez du contenu sur le site (commentaires, avis, etc.), vous :</p>
            <ul>
                <li>Confirmez que vous possédez les droits nécessaires pour ce contenu</li>
                <li>Accordez à Factory & Co le droit d'utiliser, reproduire et afficher ce contenu</li>
                <li>Acceptez que le contenu ne soit pas confidentiel</li>
                <li>Acceptez que Factory & Co modifie ou supprime votre contenu à sa discrétion</li>
            </ul>

            <h2>5. Liens externes et contenu tiers</h2>
            <p>Le site peut contenir des liens vers des sites externes ou du contenu fourni par des tiers. Factory & Co :</p>
            <ul>
                <li>N'est pas responsable du contenu de ces sites externes</li>
                <li>N'endosse pas les opinions ou produits présentés par les tiers</li>
                <li>Ne peut être tenue responsable de tout dommage résultant de l'accès à ces ressources externes</li>
            </ul>

            <h2>6. Commandes et paiements</h2>
            <p>Pour les services de Click & Collect ou autres commandes :</p>
            <ul>
                <li>Vous garantissez que les informations fournies sont exactes et complètes</li>
                <li>Vous acceptez les prix affichés au moment de la commande</li>
                <li>Factory & Co se réserve le droit de refuser ou annuler une commande</li>
                <li>Les paiements doivent être effectués selon les modalités indiquées</li>
                <li>Factory & Co n'est pas responsable des problèmes de paiement liés à votre banque ou prestataire</li>
            </ul>

            <h2>7. Limitation de responsabilité</h2>
            <p>Factory & Co Aéroville ne peut être tenue responsable pour :</p>
            <ul>
                <li>Les pertes de données ou d'informations</li>
                <li>Les dommages consécutifs ou indirects</li>
                <li>Les interruptions de service ou les erreurs techniques</li>
                <li>L'utilisation du contenu du site par des tiers non autorisés</li>
                <li>Les actions des utilisateurs ou tiers</li>
            </ul>
            <p>Cette limitation s'applique dans la limite permise par la loi applicable.</p>

            <h2>8. Propriété intellectuelle</h2>
            <p>Tous les éléments du site (textes, images, logos, vidéos, éléments graphiques, codes source) sont la propriété de Factory & Co Aéroville ou sont utilisés avec autorisation. Toute reproduction, distribution ou transmission sans autorisation écrite est strictement interdite.</p>

            <h2>9. Données personnelles</h2>
            <p>Pour plus d'informations sur la collecte, l'utilisation et la protection de vos données personnelles, veuillez consulter notre <a href="{{ route('confidentialite') }}">politique de confidentialité</a>.</p>

            <h2>10. Modifications des conditions</h2>
            <p>Factory & Co Aéroville se réserve le droit de modifier ces conditions d'utilisation à tout moment. Les modifications sont effectives dès leur publication sur le site. Votre utilisation continue du site implique votre acceptation des conditions modifiées.</p>

            <h2>11. Droit applicable et juridiction</h2>
            <p>Ces conditions d'utilisation sont régies par la loi française. Tout litige découlant de l'utilisation du site sera soumis à la juridiction des tribunaux français compétents.</p>

            <h2>12. Contact et réclamations</h2>
            <p>Pour toute question ou réclamation concernant ces conditions d'utilisation :</p>
            <ul>
                <li>Email : <a href="mailto:contact@factoryandco.com">contact@factoryandco.com</a></li>
                <li>Téléphone : <a href="tel:+33174257852">+33 1 74 25 78 52</a></li>
                <li>Adresse : 30 Rue des Buissons, 93290 Tremblay-en-France, France</li>
            </ul>

            <h2>13. Dispositions diverses</h2>
            <p>Si une disposition de ces conditions est déclarée invalide ou inapplicable, les autres dispositions restent en vigueur. Factory & Co se réserve le droit de faire valoir tous ses droits légaux.</p>
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
