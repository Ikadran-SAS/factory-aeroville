# Factory & Co Val d'Europe — Mini-Site SEO
## Laravel 12 + Vue.js 3 + Vite + Tailwind CSS

> Projet développé selon l'étude SEO & Architecture du mini-site Factory & Co Val d'Europe.
> Architecture en silos sémantiques — 10 pages — JSON-LD Schema.org complet.

---

## Stack Technique

| Couche | Technologie |
|---|---|
| Backend | Laravel 11 (PHP 8.2+) |
| Frontend | Vue.js 3 (Composition API) |
| Build | Vite 5 + laravel-vite-plugin |
| CSS | CSS custom (variables) + Tailwind CSS 3 |
| Base de données | MySQL 8 / SQLite (développement) |
| Polices | Lexend (Google Fonts) + Homestead (custom) |

---

## Architecture en Silos SEO

```
/ (Hub de marque)
├── /carte/burgers          → Silo 1 : L'Atelier Burger
├── /carte/bagels           → Silo 2 : Bagels New-Yorkais
├── /carte/cheesecake       → Silo 3 : Cheesecake Factory
├── /carte/bowls            → Silo 4 : Healthy & Bowls
├── /click-collect          → Service : Click & Collect
├── /guide-voyageur/        → Blog : Guide du Voyageur
│   └── /guide-voyageur/{slug}
├── /faq                    → FAQ (FAQPage Schema)
├── /contact                → Contact (NAP)
├── /sitemap.xml            → Sitemap XML
└── /robots.txt             → Robots.txt
```

---

## Installation

### Prérequis
- PHP 8.2+
- Composer
- Node.js 18+ & pnpm (ou npm)
- MySQL 8 (ou SQLite pour le développement)

### 1. Cloner et installer les dépendances PHP

```bash
git clone <repo> factory-co
cd factory-co
composer install
cp .env.example .env
php artisan key:generate
```

### 2. Configurer la base de données

Dans `.env` :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=factory_co
DB_USERNAME=root
DB_PASSWORD=
```

Pour SQLite (développement rapide) :
```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

### 3. Migrations et Seeders

```bash
# Créer les tables
php artisan migrate

# Peupler la base de données avec tout le contenu
php artisan db:seed

# Ou tout en une commande
php artisan migrate:fresh --seed
```

**Résultat du seeder :**

| Table | Enregistrements |
|---|---|
| `products` | ~40 produits (burgers, bagels, cheesecake, bowls) |
| `reviews` | 6 avis Google/TripAdvisor |
| `blog_posts` | 6 articles Guide du Voyageur |
| `faq_items` | ~25 questions FAQ (5 catégories) |
| `opening_hours` | 3 plages horaires |

### 4. Assets Frontend

```bash
# Installer les dépendances Node.js
pnpm install

# Développement (hot reload)
pnpm dev

# Production
pnpm build
```

### 5. Lancer le serveur

```bash
php artisan serve
```

Accéder à : **http://localhost:8000**

---

## Structure des Fichiers

```
factory-co/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php       # Accueil, Click & Collect
│   │   ├── MenuController.php       # 4 silos produits
│   │   ├── BlogController.php       # Guide du Voyageur
│   │   ├── FaqController.php        # FAQ
│   │   ├── ContactController.php    # Contact + validation
│   │   └── SitemapController.php    # Sitemap XML + robots.txt
│   └── Models/
│       ├── Product.php              # Produits avec scopes Eloquent
│       ├── Review.php               # Avis clients
│       ├── BlogPost.php             # Articles de blog
│       ├── FaqItem.php              # Questions FAQ
│       └── OpeningHour.php          # Horaires d'ouverture
├── database/
│   ├── migrations/
│   │   ├── ..._create_products_table.php
│   │   ├── ..._create_reviews_table.php
│   │   ├── ..._create_blog_posts_table.php
│   │   └── ..._create_faq_items_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php       # Orchestrateur principal
│       ├── ProductSeeder.php        # ~40 produits avec prix, badges, allergènes
│       ├── ReviewSeeder.php         # 6 avis Google/TripAdvisor
│       ├── BlogPostSeeder.php       # 6 articles SEO
│       └── FaqSeeder.php            # 25 FAQ + 3 plages horaires
├── resources/
│   ├── css/
│   │   └── app.css                  # Charte graphique complète (variables CSS)
│   ├── js/
│   │   ├── app.js                   # Point d'entrée Vue.js 3
│   │   └── components/
│   │       ├── ProductGrid.vue      # Grille 4 silos (Home)
│   │       ├── MenuProductGrid.vue  # Grille produits avec filtres
│   │       ├── ReviewsCarousel.vue  # Avis Google avec note agrégée
│   │       └── FaqAccordion.vue     # Accordion FAQ avec recherche
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php        # Layout principal (SEO, JSON-LD, Vue.js)
│       │   └── partials/
│       │       ├── topbar.blade.php # Topbar rose (Click & Collect, Horaires)
│       │       ├── navbar.blade.php # Navbar navy sticky avec dropdown
│       │       └── footer.blade.php # Footer rose (NAP, maillage interne)
│       ├── pages/
│       │   ├── home.blade.php       # Page d'accueil (8 sections)
│       │   ├── faq.blade.php        # FAQ (FAQPage Schema)
│       │   ├── contact.blade.php    # Contact (formulaire + carte)
│       │   ├── click-collect.blade.php
│       │   └── menu/
│       │       ├── burgers.blade.php
│       │       ├── bagels.blade.php
│       │       ├── cheesecake.blade.php
│       │       └── bowls.blade.php
│       │   └── blog/
│       │       ├── index.blade.php
│       │       └── show.blade.php
│       └── sitemap.blade.php        # Sitemap XML
├── routes/
│   └── web.php                      # 12 routes SEO
├── vite.config.js
├── tailwind.config.js
├── package.json
└── README.md
```

---

## Charte Graphique

| Variable | Valeur | Usage |
|---|---|---|
| `--navy` | `#1B263A` | Fond navbar, sections sombres, textes |
| `--pink` | `#F5C3DB` | Topbar, badges, footer, CTA |
| `--pink-dark` | `#CC3366` | Hover, liens actifs, prix |
| `--white` | `#FFFFFF` | Textes sur fond sombre |
| `--font-title` | `Homestead` | Titres H1/H2/H3 |
| `--font-body` | `Lexend` | Corps de texte |

**Police Homestead :** Placer les fichiers `Homestead.woff2` et `Homestead.woff` dans `/public/fonts/`.

---

## SEO Technique Implémenté

### JSON-LD Schema.org
- `Restaurant` global dans le layout (horaires, adresse GPS, avis agrégés, menus)
- `BreadcrumbList` sur toutes les sous-pages
- `Menu` + `MenuItem` sur les pages silos produits
- `FAQPage` sur la page FAQ (optimisé recherche vocale)
- `Article` sur les pages blog

### Balises Meta
- Title, Description, Keywords, Canonical sur chaque page
- Open Graph (og:type, og:title, og:description, og:image, og:locale)
- Twitter Card (summary_large_image)
- Geo meta (geo.region, geo.position, ICBM)
- Robots (index, follow)

### Maillage Interne
- Bloc de 4 liens silos dans le footer sur toutes les pages
- Section "Découvrez aussi" sur chaque page silo (3 liens vers les autres silos)
- Topbar avec liens Click & Collect et Horaires
- Sitemap XML avec priorités et fréquences

### Accessibilité
- Attributs `role`, `aria-label`, `aria-expanded` sur tous les éléments interactifs
- Balises sémantiques HTML5 (`<nav>`, `<main>`, `<footer>`, `<article>`)
- Textes alternatifs sur toutes les images
- Breadcrumb visible sur toutes les sous-pages

---

## Composants Vue.js

### `ProductGrid`
Grille des 4 silos sur la page d'accueil. Reçoit les produits et les routes depuis Blade via `:products` et `:routes`.

### `MenuProductGrid`
Grille produits avec filtres par sous-catégorie sur les pages silos. Overlay au hover avec ingrédients et badges (Halal, Végétarien, Vegan).

### `ReviewsCarousel`
Affichage des avis clients avec note agrégée, étoiles et logo Google/TripAdvisor.

### `FaqAccordion`
Accordion FAQ avec barre de recherche en temps réel. Supporte les catégories et les transitions CSS.

---

## Modèles Eloquent & Scopes

```php
// Exemples d'utilisation
Product::available()->featured()->category('burgers')->ordered()->get()
Review::featured()->orderBy('sort_order')->take(3)->get()
BlogPost::published()->featured()->first()
FaqItem::grouped() // Retourne les items groupés par catégorie
OpeningHour::orderBy('sort_order')->get()
```

---

## Variables d'Environnement

```env
APP_NAME="Factory & Co Val d'Europe"
APP_URL=https://val-deurope.factoryandco.com

# Mail (pour le formulaire de contact)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS=contact@factoryandco.com
MAIL_FROM_NAME="Factory & Co Toulouse-Blagnac"
```

---

## Déploiement Production

```bash
# Optimisation Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Build assets
pnpm build

# Permissions
chmod -R 755 storage bootstrap/cache
```

---

*Développé pour Factory & Co Val d'Europe — © 2026*
