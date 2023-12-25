<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\House;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Apartment>
 */
class ApartmentFactory extends Factory
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
            'area' => rand(25,200),
            'rooms' => rand(1, 5),
            'layout_image' => fake()->imageUrl(),
            'price' => rand(2500000,20000000),
            'house_id' => House::get()->random()->id,
        ];
    }
}
