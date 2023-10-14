<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attribute>
 */
class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 10),
            'size_id' => $this->faker->numberBetween(1, 10),
            'color_id' => $this->faker->numberBetween(1, 10),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
