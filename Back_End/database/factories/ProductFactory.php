<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'description' => $this->faker->paragraph(2),
            'image' => fake()->imageUrl(),
            'category_id' => $this->faker->numberBetween(1,10),
            'size_id' => $this->faker->numberBetween(1,10),
            'color_id' => $this->faker->numberBetween(1,10),
            'total_quantity' => $this->faker->numberBetween(1,10),
        ];
    }
}
