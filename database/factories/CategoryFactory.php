<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = \App\Models\Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->paragraphs(2, true),
            'image' => Str::random(10),
            'video' => Str::random(10),
            'social_media_link' => 'https://www.google.com',
            'author_id' => \App\Models\Author::factory(),
            'category_type_id' => \App\Models\CategoryType::factory()
        ];
    }
}
