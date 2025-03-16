<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['name' => 'mobile'],
            ['name' => 'desktop'],
            ['name' => 'web'],
        ];
    
        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
