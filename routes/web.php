<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Factory & Co Val d'Europe — Routes Web
|--------------------------------------------------------------------------
| Architecture en silos SEO :
|   Niveau 1 : Hub de marque (Accueil)
|   Niveau 2 : Silos produits (Burgers, Bagels, Cheesecake, Bowls)
|   Niveau 3 : Services & Engagement (Click & Collect, Blog, FAQ, Contact)
*/

/* ── NIVEAU 1 : Hub de marque ── */
Route::get('/', [HomeController::class, 'index'])->name('home');

/* ── NIVEAU 2 : Silos produits ── */
Route::prefix('carte')->name('menu.')->group(function () {
    Route::get('/burgers',    [MenuController::class, 'burgers'])->name('burgers');
    Route::get('/bagels',     [MenuController::class, 'bagels'])->name('bagels');
    Route::get('/cheesecake', [MenuController::class, 'cheesecake'])->name('cheesecake');
    Route::get('/bowls',      [MenuController::class, 'bowls'])->name('bowls');
});

/* ── NIVEAU 3 : Services & Engagement ── */
Route::get('/click-collect', [HomeController::class, 'clickCollect'])->name('click-collect');

// Blog / Guide du Voyageur
Route::prefix('guide-voyageur')->name('blog.')->group(function () {
    Route::get('/',        [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}',  [BlogController::class, 'show'])->name('show');
});

// FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Contact
Route::get('/contact',  [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

/* ── SEO Technique ── */
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt',  [SitemapController::class, 'robots'])->name('robots');
