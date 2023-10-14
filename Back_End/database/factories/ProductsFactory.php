<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'price'=>$this->faker->numberBetween(200000,500000),
            'image'=>$this->faker->imageUrl(),
            'category_id'=>1,
            'size_id'=>2,
            'color_id'=>3,
            'total_quantity'=>1,
        ];
    }
}
