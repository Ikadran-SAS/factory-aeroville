<?php

use App\Http\Controllers\AvisController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ConceptController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SpecialitesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Factory & Co Aéroville — Routes Web
|--------------------------------------------------------------------------
| Architecture en silos SEO :
|   Niveau 1 : Hub de marque (Accueil)
|   Niveau 2 : Silos produits (Burgers, Bagels, Cheesecake, Bowls)
|   Niveau 3 : Services & Engagement (Click & Collect, Blog, FAQ, Contact)
*/

/* ── NIVEAU 1 : Hub de marque ── */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/concept', [ConceptController::class, 'index'])->name('concept');
Route::get('/specialites', [SpecialitesController::class, 'index'])->name('specialites');
Route::get('/avis', [AvisController::class, 'index'])->name('avis');

/* ── NIVEAU 2 : Silos produits ── */
Route::get('/carte', [MenuController::class, 'index'])->name('menu.index');

/* ── NIVEAU 3 : Services & Engagement ── */

// Blog
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});

// FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Legal
Route::get('/mentions-legales', function () {
    return view('pages.mentions-legales');
})->name('mentions-legales');
Route::get('/confidentialite', function () {
    return view('pages.confidentialite');
})->name('confidentialite');
Route::get('/conditions-utilisation', function () {
    return view('pages.conditions-utilisation');
})->name('conditions-utilisation');

/* ── SEO Technique ── */
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/sitemap', [SitemapController::class, 'html'])->name('sitemap.html');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');
