<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Ordre d'exécution : horaires/FAQ → produits → avis → blog
     */
    public function run(): void
    {
        $this->command->info('');
        $this->command->info('🍔 Factory & Co Aéroville — Seeding de la base de données...');
        $this->command->info('');

        $this->call([
            FaqSeeder::class,       // Horaires + FAQ
            ProductSeeder::class,   // Produits (burgers, bagels, cheesecake, bowls)
            ReviewSeeder::class,    // Avis clients (fallback statiques)
            BlogPostSeeder::class,  // Articles du blog
        ]);

        $this->command->info('');
        $this->command->info('✅ Base de données seedée avec succès !');
        $this->command->info('');
        $this->command->table(
            ['Table', 'Enregistrements'],
            [
                ['products', \App\Models\Product::count()],
                ['reviews', \App\Models\Review::count()],
                ['blog_posts', \App\Models\BlogPost::count()],
                ['faq_items', \App\Models\FaqItem::count()],
                ['opening_hours', \App\Models\OpeningHour::count()],
            ]
        );
    }
}
