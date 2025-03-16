<?php

namespace Tests\Feature;

use App\Helpers\Helpers;
use Tests\TestCase;
use App\Models\User;
use App\Models\Locale;
use Database\Seeders\LocaleSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocaleControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_locales()
    {
        $this->seed(LocaleSeeder::class);

        Helpers::authenticateUser($this);
        
        $response = $this->getJson('/api/locales');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_create_a_locale()
    {
        Helpers::authenticateUser($this);

        $data = [
            'code' => 'de',
            'name' => 'German',
        ];

        $response = $this->postJson('/api/locales', $data);

        $response->assertStatus(201)
            ->assertJson([
                'code' => 'de',
                'name' => 'German',
            ]);

        $this->assertDatabaseHas('locales', [
            'code' => 'de',
            'name' => 'German',
        ]);
    }

    /** @test */
    public function it_can_update_a_locale()
    {
        Helpers::authenticateUser($this);

        $locale = Locale::factory()->create([
            'code' => 'en',
            'name' => 'English',
        ]);

        $updatedData = [
            'code' => 'en-us',
            'name' => 'English (US)',
        ];

        $response = $this->putJson("/api/locales/{$locale->id}", $updatedData);

        $response->assertStatus(200)
            ->assertJson([
                'code' => 'en-us',
                'name' => 'English (US)',
            ]);

        $this->assertDatabaseHas('locales', [
            'id' => $locale->id,
            'code' => 'en-us',
            'name' => 'English (US)',
        ]);
    }

    /** @test */
    public function it_can_delete_a_locale()
    {
        Helpers::authenticateUser($this);

        $locale = Locale::factory()->create([
            'code' => 'fr',
            'name' => 'French',
        ]);

        $response = $this->deleteJson("/api/locales/{$locale->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('locales', [
            'id' => $locale->id,
        ]);
    }
}
