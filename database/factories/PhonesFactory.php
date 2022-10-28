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
        return [
            'name' => fake()->text(20),
            'price' => fake()->randomFloat(null,100,1000),
            'img' => fake()->text(20),
            'remember_token' => Str::random(10),
            'category_id' => category::factory()
        ];
    }
}
