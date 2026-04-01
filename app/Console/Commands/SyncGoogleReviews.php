<?php

namespace App\Console\Commands;

use App\Http\Controllers\GoogleBusinessController;
use App\Models\Review;
use Illuminate\Console\Command;

class SyncGoogleReviews extends Command
{
    protected $signature = 'reviews:sync-google';

    protected $description = 'Synchronise les vrais avis Google Places vers la base de données';

    public function handle(): int
    {
        $this->info('Synchronisation des avis Google Places...');

        $apiKey = config('app.google_places_api_key');

        if (! $apiKey) {
            $this->error('GOOGLE_PLACES_API_KEY non configurée dans .env');

            return 1;
        }

        try {
            $controller = new GoogleBusinessController;
            $googleReviews = $controller->getReviews();

            if (empty($googleReviews)) {
                $this->warn('Aucun avis récupéré depuis Google.');

                return 1;
            }

            $this->line('  '.$this->formatCount($googleReviews).' avis récupérés depuis Google Places');

            $synced = 0;
            $updated = 0;
            $skipped = 0;
            $maxSortOrder = Review::max('sort_order') ?? 0;

            foreach ($googleReviews as $data) {
                $existing = Review::where('author_name', $data['author_name'])
                    ->where('content', $data['content'])
                    ->first();

                if ($existing) {
                    if ($data['date_label'] && $existing->date_label !== $data['date_label']) {
                        $existing->update(['date_label' => $data['date_label']]);
                        $updated++;
                        $this->line("  ↻ Mis à jour : {$data['author_name']}");
                    } else {
                        $skipped++;
                    }

                    continue;
                }

                $maxSortOrder++;

                Review::create([
                    'author_name' => $data['author_name'],
                    'author_initial' => $data['author_initial'],
                    'avatar_color' => $this->generateAvatarColor(),
                    'rating' => $data['rating'],
                    'content' => $data['content'],
                    'source' => 'google',
                    'date_label' => $data['date_label'],
                    'is_featured' => false,
                    'is_visible' => true,
                    'sort_order' => $maxSortOrder,
                ]);

                $synced++;
                $this->line("  ✓ Ajouté : {$data['author_name']} ({$data['rating']}★)");
            }

            $this->newLine();
            $this->info('Synchronisation terminée !');
            $this->line("  Ajoutés : {$synced}");
            $this->line("  Mis à jour : {$updated}");
            $this->line("  Ignorés : {$skipped}");
            $this->line('  Total en base : '.Review::count());

            return 0;
        } catch (\Exception $e) {
            $this->error('Erreur : '.$e->getMessage());

            return 1;
        }
    }

    private function formatCount(array $items): int
    {
        return count($items);
    }

    private function generateAvatarColor(): string
    {
        $colors = ['#1B263A', '#CC3366', '#4A90D9', '#27AE60', '#E67E22', '#8E44AD', '#FF6B6B', '#4ECDC4'];

        return $colors[array_rand($colors)];
    }
}
