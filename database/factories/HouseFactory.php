<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => fake()->realTextBetween(20,70),
            'completion_date' => fake()->randomElement(['IV кв. 2025 года', 'III кв. 2024 года', 'I кв. 2024 года']),
            'project_id' => Project::get()->random()->id,
        ];
    }
}
