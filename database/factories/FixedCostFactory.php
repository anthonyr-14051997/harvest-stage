<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FixedCost>
 */
class FixedCostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'value' => $this->faker->randomFloat(2, 100, 2500),
            'name' => $this->faker->sentence(rand(5, 10), true),
            'periode' => $this->faker->numberBetween(1, 12),
            'date' => $this->faker->date(),
            'user_id' => $this->faker->numberBetween(1, 11)
        ];
    }
}
