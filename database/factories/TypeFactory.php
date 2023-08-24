<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $vehicle_name = [
            'Sedan',
            'SUV',
            'Hatchback',
            'Coupe',
            'Pickup Truck',
            'Convertible',
        ];


        $vehicle_name = $this->faker->unique()->randomElement($vehicle_name);

        return [
            'vehicle_name' => $vehicle_name,
        ];

    }
}
