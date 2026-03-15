<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        Review::truncate();

        $reviews = [
            [
                'author_name'    => 'Marie L.',
                'author_initial' => 'M',
                'avatar_color'   => '#1B263A',
                'rating'         => 5,
                'content'        => 'Excellent restaurant à Val d\'Europe ! Le smash burger est vraiment délicieux, la viande est de qualité et la sauce maison est top. Service rapide et souriant. Je recommande vivement !',
                'source'         => 'google',
                'date_label'     => 'Il y a 2 semaines',
                'is_featured'    => true,
                'sort_order'     => 1,
            ],
            [
                'author_name'    => 'Thomas R.',
                'author_initial' => 'T',
                'avatar_color'   => '#CC3366',
                'rating'         => 5,
                'content'        => 'Le cheesecake New-Yorkais est une tuerie absolue. Texture parfaite, base biscuitée croustillante. On a aussi pris des bagels pour le petit-déjeuner avant notre vol, vraiment frais et copieux !',
                'source'         => 'google',
                'date_label'     => 'Il y a 1 mois',
                'is_featured'    => true,
                'sort_order'     => 2,
            ],
            [
                'author_name'    => 'Sophie M.',
                'author_initial' => 'S',
                'avatar_color'   => '#4A90D9',
                'rating'         => 4,
                'content'        => 'Très bonne adresse à Val d\'Europe. Idéal pour une pause shopping ou une visite à Disneyland, les portions sont généreuses et les prix raisonnables. Le milkshake Oreo est incroyable !',
                'source'         => 'google',
                'date_label'     => 'Il y a 3 semaines',
                'is_featured'    => true,
                'sort_order'     => 3,
            ],
            [
                'author_name'    => 'Jean-Pierre D.',
                'author_initial' => 'J',
                'avatar_color'   => '#27AE60',
                'rating'         => 5,
                'content'        => 'Halal et délicieux ! Rare de trouver une option Halal de qualité dans un centre commercial. Le Halal Smash Burger était juteux et bien assaisonné. Je reviendrai à chaque passage à Val d\'Europe.',
                'source'         => 'google',
                'date_label'     => 'Il y a 2 mois',
                'is_featured'    => false,
                'sort_order'     => 4,
            ],
            [
                'author_name'    => 'Camille B.',
                'author_initial' => 'C',
                'avatar_color'   => '#E67E22',
                'rating'         => 5,
                'content'        => 'Le Lost Bagel au saumon fumé est mon péché mignon à chaque visite ! Le cream cheese est généreux, le saumon de qualité. Un vrai bagel new-yorkais, pas une copie. Bravo !',
                'source'         => 'tripadvisor',
                'date_label'     => 'Il y a 3 semaines',
                'is_featured'    => false,
                'sort_order'     => 5,
            ],
            [
                'author_name'    => 'Lucas F.',
                'author_initial' => 'L',
                'avatar_color'   => '#8E44AD',
                'rating'         => 5,
                'content'        => 'Végétarien depuis 5 ans, c\'est difficile de trouver de bons plats en centre commercial. Ici, le Veggie Bowl et le Veggie Smash sont vraiment bons. Ingrédients frais, préparation soignée.',
                'source'         => 'google',
                'date_label'     => 'Il y a 1 semaine',
                'is_featured'    => false,
                'sort_order'     => 6,
            ],
        ];

        foreach ($reviews as $data) {
            Review::create($data);
        }

        $this->command->info('✅ ' . count($reviews) . ' avis insérés.');
    }
}
