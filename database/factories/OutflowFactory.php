<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Outflow>
 */
class OutflowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'value' => $this->faker->numberBetween(100, 500),
            'periode' => $this->faker->numberBetween(1, 12),
            'name' => $this->faker->sentence(rand(5, 10), true),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
