<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url><loc>{{ route('home') }}</loc><lastmod>{{ now()->toDateString() }}</lastmod><changefreq>weekly</changefreq><priority>1.0</priority></url>
    <url><loc>{{ route('menu.index') }}</loc><lastmod>{{ now()->toDateString() }}</lastmod><changefreq>monthly</changefreq><priority>0.9</priority></url>
    <url><loc>{{ route('concept') }}</loc><lastmod>{{ now()->toDateString() }}</lastmod><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('specialites') }}</loc><lastmod>{{ now()->toDateString() }}</lastmod><changefreq>monthly</changefreq><priority>0.7</priority></url>
    <url><loc>{{ route('avis') }}</loc><lastmod>{{ now()->toDateString() }}</lastmod><changefreq>monthly</changefreq><priority>0.7</priority></url>
    <url><loc>{{ route('blog.index') }}</loc><lastmod>{{ now()->toDateString() }}</lastmod><changefreq>weekly</changefreq><priority>0.7</priority></url>
    @foreach($posts as $post)
    <url><loc>{{ route('blog.show', $post->slug) }}</loc><lastmod>{{ $post->updated_at->toDateString() }}</lastmod><changefreq>monthly</changefreq><priority>0.6</priority></url>
    @endforeach
    <url><loc>{{ route('faq') }}</loc><lastmod>{{ now()->toDateString() }}</lastmod><changefreq>monthly</changefreq><priority>0.7</priority></url>
    <url><loc>{{ route('contact') }}</loc><lastmod>{{ now()->toDateString() }}</lastmod><changefreq>yearly</changefreq><priority>0.5</priority></url>
    <url><loc>{{ route('mentions-legales') }}</loc><lastmod>{{ now()->toDateString() }}</lastmod><changefreq>yearly</changefreq><priority>0.3</priority></url>
    <url><loc>{{ route('confidentialite') }}</loc><lastmod>{{ now()->toDateString() }}</lastmod><changefreq>yearly</changefreq><priority>0.3</priority></url>
    <url><loc>{{ route('conditions-utilisation') }}</loc><lastmod>{{ now()->toDateString() }}</lastmod><changefreq>yearly</changefreq><priority>0.3</priority></url>
</urlset>
