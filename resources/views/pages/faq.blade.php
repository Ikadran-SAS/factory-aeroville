@extends('layouts.app')
@section('title', $seo['title'])
@section('description', $seo['description'])
@section('keywords', $seo['keywords'])
@section('canonical', $seo['canonical'])

@push('schema')
@php
    $mainEntity = [];
    foreach ($faqs->flatten() as $faq) {
        $mainEntity[] = [
            '@type' => 'Question',
            'name' => $faq->question,
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => strip_tags($faq->answer)
            ]
        ];
    }

    $faqPageSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $mainEntity
    ];

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
                'name' => 'FAQ',
                'item' => route('faq')
            ]
        ]
    ];
@endphp
<script type="application/ld+json">{!! json_encode($faqPageSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')
<nav class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Accueil</a><span class="bc-sep">›</span><span>FAQ</span></div></nav>

<div class="page-hero">
    <div class="page-hero-inner">
        <span class="section-tag">Recherche vocale optimisée</span>
        <h1>Questions fréquentes<br><em>Factory &amp; Co Aéroville</em></h1>
        <p>Toutes les réponses sur nos horaires, notre localisation, nos options Halal et nos allergènes.</p>
    </div>
</div>

@php
$faqsFlat = collect($faqs)->flatten(1)->values()->all();
$faqsEncoded = base64_encode(json_encode($faqsFlat));
@endphp

<section class="section section-light">
    <div class="container">
        {{-- Composant Vue.js FAQ Accordion --}}
        <div id="faq-accordion-app" data-faqs="{{ $faqsEncoded }}"></div>

        {{-- Fallback HTML --}}
        <noscript>
            @foreach($faqs as $category => $items)
                <div class="faq-category">
                    <h2 class="faq-category-title">
                        {{ $items->first()->category_icon }} {{ $items->first()->category_label }}
                    </h2>
                    @foreach($items as $item)
                        <details class="faq-item">
                            <summary>{{ $item->question }}</summary>
                            <div>{!! $item->answer !!}</div>
                        </details>
                    @endforeach
                </div>
            @endforeach
        </noscript>
    </div>
</section>

<section class="section section-dark">
    <div class="container">
        <div class="cta-block">
            <h2>Vous n'avez pas trouvé votre réponse ?</h2>
            <p>Notre équipe vous répond sous 4 heures.</p>
            <a href="{{ route('contact') }}" class="btn btn-pink">Nous contacter</a>
        </div>
    </div>
</section>
@endsection
