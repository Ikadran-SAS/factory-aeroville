<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Synchronisation des vrais avis Google Places...');

        Artisan::call('reviews:sync-google', [], $this->command->getOutput());
    }
}
