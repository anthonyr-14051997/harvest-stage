<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flow>
 */
class FlowFactory extends Factory
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
            'name' => $this->faker->words(rand(1, 3), true),
            'date' => $this->faker->date(),
            'type' => $this->faker->randomElement(['inflow', 'outflow'], 1),
            'user_id' => $this->faker->numberBetween(1, 11),
            'percentage_urssaf_id' => $this->faker->numberBetween(1, 3)
        ];
    }
}
