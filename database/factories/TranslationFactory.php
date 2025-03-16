<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Locale;
use App\Models\Translation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Translation>
 */
class TranslationFactory extends Factory
{
    protected $model = Translation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'key' => 'translation_key_' . uniqid(), // Generate a unique key
            'value' => $this->faker->sentence,
            'locale_id' => $this->faker->randomElement([1, 2, 3]), // Only use locale IDs 1, 2, or 3
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Translation $translation) {
            // Attach 1-3 random tags to each translation
            $tags = Tag::inRandomOrder()->limit(rand(1, 3))->pluck('id');
            $translation->tags()->attach($tags);
        });
    }
}
