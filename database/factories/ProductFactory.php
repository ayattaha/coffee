<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'name' => $this->faker->word,
                'price' => $this->faker->randomFloat(2, 10, 1000),
                'image' =>  $this->faker->imageUrl(),
                'description' => $this->faker->paragraph,
                'special_item' => $this->faker->boolean(20), // 20% chance of being special
                'published' => true,
                'category_id' => fake()->numberBetween(1,3)
        ];
    }
}
