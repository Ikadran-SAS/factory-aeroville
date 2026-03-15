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
                'name' => 'Contact',
                'item' => route('contact')
            ]
        ]
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush
@section('content')
<nav class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Accueil</a><span class="bc-sep">›</span><span>Contact</span></div></nav>
<div class="page-hero">
    <div class="page-hero-inner">
        <span class="section-tag">NAP · Nom · Adresse · Téléphone</span>
        <h1>Contactez-nous –<br><em>Factory &amp; Co Val d'Europe</em></h1>
        <p>Une question, une commande ou un retour d'expérience ? Notre équipe vous répond sous 4 heures.</p>
    </div>
</div>
<section class="section section-light">
    <div class="container">
        <div class="contact-grid">
            <div>
                <h2 class="section-title dark" style="margin-bottom:2rem">Envoyez-nous un message</h2>
                @if(session('success'))
                    <div class="alert-success">✓ {{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('contact.send') }}" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="prenom">Prénom *</label>
                            <input type="text" id="prenom" name="prenom" class="form-input @error('prenom') is-invalid @enderror"
                                   value="{{ old('prenom') }}" placeholder="Votre prénom" required>
                            @error('prenom')<span class="form-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="nom">Nom *</label>
                            <input type="text" id="nom" name="nom" class="form-input @error('nom') is-invalid @enderror"
                                   value="{{ old('nom') }}" placeholder="Votre nom" required>
                            @error('nom')<span class="form-error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">E-mail *</label>
                        <input type="email" id="email" name="email" class="form-input @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" placeholder="votre@email.com" required>
                        @error('email')<span class="form-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="sujet">Sujet *</label>
                        <select id="sujet" name="sujet" class="form-select @error('sujet') is-invalid @enderror" required>
                            <option value="">Choisissez un sujet</option>
                            <option value="allergenes"    @selected(old('sujet')=='allergenes')>Question sur les allergènes</option>
                            <option value="click-collect" @selected(old('sujet')=='click-collect')>Click &amp; Collect</option>
                            <option value="recrutement"   @selected(old('sujet')=='recrutement')>Recrutement</option>
                            <option value="franchise"     @selected(old('sujet')=='franchise')>Devenir franchisé</option>
                            <option value="avis"          @selected(old('sujet')=='avis')>Retour d'expérience</option>
                            <option value="autre"         @selected(old('sujet')=='autre')>Autre</option>
                        </select>
                        @error('sujet')<span class="form-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="message">Message *</label>
                        <textarea id="message" name="message" class="form-textarea @error('message') is-invalid @enderror"
                                  placeholder="Décrivez votre demande en détail…" required>{{ old('message') }}</textarea>
                        @error('message')<span class="form-error">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="btn btn-navy" style="width:100%;justify-content:center">
                        Envoyer le message
                    </button>
                </form>
            </div>
            <div>
                <div class="info-card">
                    <h3>📍 Adresse &amp; Accès</h3>
                    <p><strong>Aéroport Toulouse-Blagnac</strong><br>Zone réservée Hall C, Portes 30–36<br>31700 Blagnac, France</p>
                    <p>Tramway T2 – Arrêt Aéroport</p>
                    <p><a href="tel:+33561000000">+33 (0)5 61 00 00 00</a></p>
                    <p><a href="mailto:contact@factoryandco.com">contact@factoryandco.com</a></p>
                </div>
                <div class="info-card">
                    <h3>🕐 Horaires d'ouverture</h3>
                    <table class="hours-table">
                        <thead><tr><th>Jours</th><th>Ouverture</th><th>Fermeture</th></tr></thead>
                        <tbody>
                            @foreach($openingHours as $hours)
                                <tr>
                                    <td>{{ $hours->days_label }}</td>
                                    <td>{{ $hours->opens_at_formatted }}</td>
                                    <td>{{ $hours->closes_at_formatted }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="map-wrap" style="height:280px">
                    <iframe title="Localisation Factory & Co Toulouse-Blagnac"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2888.0!2d1.3678!3d43.6290!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aebb6e6e6e6e6e%3A0x1!2sFactory+%26+Co+A%C3%A9roport+Toulouse-Blagnac!5e0!3m2!1sfr!2sfr!4v1"
                        allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
