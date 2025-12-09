<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\drug>
 */
class DrugFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'type' => $this->faker->colorName(),
            'description' => $this->faker->sentence(),
            'stock' => $this->faker->numberBetween(10, 500),
            'size' => $this->faker->randomElement(['small', 'medium', 'large']),
            'expiry_date' => $this->faker->dateTimeBetween(
                startDate: Carbon::now()->addDays(1),
                endDate: Carbon::now()->addYears(2)
            ),
        ];
    }
}
