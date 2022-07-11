<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
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
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
