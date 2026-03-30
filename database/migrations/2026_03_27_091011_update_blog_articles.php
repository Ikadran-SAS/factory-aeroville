<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     * NOTE: Superseded by 2026_03_29_203000_update_content_for_aeroville.php
     */
    public function up(): void
    {
        // Article 1: corrections RER, horaires, click & collect
        $article1 = DB::table('blog_posts')->where('id', 1)->first();
        if ($article1) {
            $content = str_replace(
                ['RER E', 'Horaires étendus de 07h00 à 22h30', '<h2>5. Utilisez le Click & Collect</h2><p>Commandez votre repas en ligne avant votre arrivée. Récupérez-le directement au comptoir sans attendre. Idéal pour les visiteurs pressés ou pour profiter au maximum de votre journée shopping !</p>'],
                ['RER A', 'Horaires : 8h30 - 22h (23h les vendredis et samedis)', ''],
                $article1->content
            );
            DB::table('blog_posts')->where('id', 1)->update(['content' => $content]);
        }

        // Article 2: correction RER E en RER A (superseded by Aéroville migration)
        $article2 = DB::table('blog_posts')->where('id', 2)->first();
        if ($article2) {
            $content = str_replace(
                ['<h2>Le RER E : votre meilleur allié</h2><p>Depuis la Gare de l\'Est à Paris, le RER E vous emmène directement à la gare du Val d\'Europe à Serris en seulement 25 minutes. Départ depuis le quai direction <strong>Hausmann-St-Lazare</strong>, arrivée directe à <strong>Gare du Val d\'Europe</strong>.</p><h2>Horaires et fréquences</h2><p>Le RER E fonctionne de 5h00 à 23h30', 'RER E fonctionne', 'Comment rejoindre Val d\'Europe en RER E'],
                ['<h2>Le RER A : votre meilleur allié</h2><p>Depuis Paris, le RER A vous emmène directement à la gare du Val d\'Europe à Serris. Les grandes stations de cette ligne sont Châtelet-les-Halles, Nation et Gare de Lyon. Arrivée directe à la gare du Val d\'Europe.</p><h2>Horaires et fréquences</h2><p>Le RER A fonctionne de 5h00 à 23h30', 'RER A fonctionne', 'Comment rejoindre Val d\'Europe en RER A'],
                $article2->content
            );
            DB::table('blog_posts')->where('id', 2)->update([
                'title' => 'Comment rejoindre Val d\'Europe en RER A ?',
                'slug' => 'rer-a-val-europe-serris',
                'content' => $content,
            ]);
        }

        // Article 3: Smash Burger - ajouter infos viande Angus Rance
        $article3 = DB::table('blog_posts')->where('id', 3)->first();
        if ($article3) {
            $content = str_replace(
                'bœuf français de qualité',
                'viande Angus Rance d\'origine Irlandaise, certifiée halal',
                $article3->content
            );
            DB::table('blog_posts')->where('id', 3)->update(['content' => $content]);
        }

        // Article 5: Petit-déjeuner - corriger offres et horaires
        $article5 = DB::table('blog_posts')->where('id', 5)->first();
        if ($article5) {
            $content = str_replace(
                ['Depuis 2008, nous préparons', 'Dès 07h00', '<strong>Smoothie Bowl</strong> (fruits frais, granola, chia)'],
                ['Depuis notre ouverture, nous préparons', 'Dès 8h30', '<strong>Viennoiserie</strong> (croissant ou pain au chocolat) et <strong>Pancakes</strong> (x2 avec spécialité coffeeshop)'],
                $article5->content
            );
            DB::table('blog_posts')->where('id', 5)->update(['content' => $content]);
        }

        // Article 6: Histoire - corriger infos Jonathan et années
        $article6 = DB::table('blog_posts')->where('id', 6)->first();
        if ($article6) {
            $content = str_replace(
                ['originaire de Varsovie', 'De retour en France en 2008', 'Depuis 2008, Factory & Co à Val d\'Europe s\'est implanté', 'plus de 320 avis'],
                ['qui a toujours rêvé d\'ouvrir un restaurant new-yorkais dès ses 9 ans (1989)', 'Le premier Factory & Co a ouvert en 2009. L\'établissement de Val d\'Europe a ouvert en 2016', 'Depuis 2016, Factory & Co à Val d\'Europe s\'est implanté', 'plus de 6000 avis'],
                $article6->content
            );
            DB::table('blog_posts')->where('id', 6)->update(['content' => $content]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
