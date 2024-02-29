<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\stocke>
 */
class StockeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'menu_id' => $this->faker->numberBetween(1, 10), // Assuming you have 10 menu items
            'ingredient_name' => $this->faker->word,
            'quantity' => $this->faker->numberBetween(50, 200),
            'alert_threshold' => $this->faker->numberBetween(10, 50),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
