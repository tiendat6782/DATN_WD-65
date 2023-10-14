<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReturnRequest>
 */
class ReturnRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->numberBetween(1, 10),
            'return_date' => $this->faker->date(),
            'reason' => $this->faker->paragraph(2),
            'status' => $this->faker->numberBetween(1, 3),

        ];
    }
}
