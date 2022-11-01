<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phones>
 */
class PhonesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->text(20);
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'price' => fake()->randomFloat(null,100,1000),
            'img' => fake()->text(20),
            'imgs' => fake()->text(20),
            'category_id' => category::factory()
        ];
    }
}
