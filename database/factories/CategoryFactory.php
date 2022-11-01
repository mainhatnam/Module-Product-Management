<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\category;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = category::class;

    public function definition()
    {
        $name = fake()->text(20);
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug
        ];
    }
}
