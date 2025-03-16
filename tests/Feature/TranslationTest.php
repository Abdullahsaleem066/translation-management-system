<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Helpers\Helpers;
use App\Models\Translation;
use Database\Seeders\TagSeeder;
use Database\Seeders\LocaleSeeder;
use Database\Seeders\TranslationSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TranslationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_translations()
    {
        // Authenticate the user
        Helpers::authenticateUser($this);

        // Seed the database with locales and tags
        $this->seed(LocaleSeeder::class);
        $this->seed(TagSeeder::class);

        // Create 10 translations using the factory
        Translation::factory()->count(10)->create();

        // Send a GET request to list translations
        $response = $this->getJson('/api/translations');

        // Assert the response status is 200 (OK)
        $response->assertStatus(200)
        ->assertJsonStructure([
            '*' => ['id', 'key', 'value', 'locale_id', 'tags'],
        ]);
    }
}
