<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Migrate all content from Val d'Europe to Aéroville.
     * Supersedes 2026_03_27_091011_update_blog_articles.php
     */
    public function up(): void
    {
        // Blog posts: replace all Val d'Europe references
        DB::table('blog_posts')->get()->each(function ($post) {
            $fields = ['title', 'slug', 'content', 'excerpt', 'meta_title', 'meta_description', 'image_alt'];
            $updates = [];

            foreach ($fields as $field) {
                if (! $post->$field) {
                    continue;
                }

                $value = $post->$field;
                $value = str_replace("Val d'Europe", 'Aéroville', $value);
                $value = str_replace("val d'europe", 'aéroville', $value);
                $value = str_replace('val-europe', 'aeroville', $value);
                $value = str_replace('Serris', 'Tremblay-en-France', $value);
                $value = str_replace('serris', 'tremblay-en-france', $value);
                $value = str_replace('77700', '93290', $value);
                $value = str_replace('14 Rue du Danube', '30 Rue des Buissons', $value);
                $value = str_replace('RER E', 'RER B', $value);
                $value = str_replace('RER A', 'RER B Parc des Expositions', $value);

                if ($value !== $post->$field) {
                    $updates[$field] = $value;
                }
            }

            if (! empty($updates)) {
                DB::table('blog_posts')->where('id', $post->id)->update($updates);
            }
        });

        // FAQ items: replace all Val d'Europe references
        DB::table('faq_items')->get()->each(function ($faq) {
            $fields = ['question', 'answer'];
            $updates = [];

            foreach ($fields as $field) {
                if (! $faq->$field) {
                    continue;
                }

                $value = $faq->$field;
                $value = str_replace("Val d'Europe", 'Aéroville', $value);
                $value = str_replace("val d'europe", 'aéroville', $value);
                $value = str_replace('Serris', 'Tremblay-en-France', $value);
                $value = str_replace('77700', '93290', $value);
                $value = str_replace('14 Rue du Danube', '30 Rue des Buissons', $value);
                $value = str_replace('RER A', 'RER B Parc des Expositions', $value);

                if ($value !== $faq->$field) {
                    $updates[$field] = $value;
                }
            }

            if (! empty($updates)) {
                DB::table('faq_items')->where('id', $faq->id)->update($updates);
            }
        });

        // Reviews: replace all Val d'Europe references
        DB::table('reviews')->get()->each(function ($review) {
            $value = $review->content;
            $original = $value;

            $value = str_replace("Val d'Europe", 'Aéroville', $value);
            $value = str_replace("val d'europe", 'aéroville', $value);
            $value = str_replace('Disneyland', 'Pathé Aéroville', $value);

            if ($value !== $original) {
                DB::table('reviews')->where('id', $review->id)->update(['content' => $value]);
            }
        });

        // Opening hours: update if needed
        DB::table('opening_hours')->get()->each(function ($hours) {
            $value = $hours->days_label ?? '';
            $original = $value;

            $value = str_replace("Val d'Europe", 'Aéroville', $value);

            if ($value !== $original) {
                DB::table('opening_hours')->where('id', $hours->id)->update(['days_label' => $value]);
            }
        });
    }

    public function down(): void
    {
        //
    }
};
