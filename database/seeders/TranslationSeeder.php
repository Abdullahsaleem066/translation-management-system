<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chunks = 1000; // Define chunk size

        foreach (range(1, 100) as $i) { // 100 * 1000 = 100,000
            Translation::factory()->count($chunks)->create();
        }
    }
}
