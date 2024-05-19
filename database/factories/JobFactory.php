<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle,
            'location' => $this->faker->address,
            'timing' => $this->faker->randomElement(['full-time', 'part-time', 'flexible']),
            'description' => $this->faker->paragraph,
            'salary' => $this->faker->randomFloat(2, 1000, 10000),
            'experience' => $this->faker->sentence(),
            'company_name' => $this->faker->company,
            'company_location' => $this->faker->address,
            'company_website' => $this->faker->url,
        ];
    }
}
