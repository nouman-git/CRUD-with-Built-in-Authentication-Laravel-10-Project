<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manufacturer>
 */
class ManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $manufacturerNames = [
            'Toyota', 'Honda',  'Nissan',
            'BMW', 'Audi', 'Volkswagen', 
        ];

        $manufacturerName = $this->faker->unique()->randomElement($manufacturerNames);

        return [
            'manufacturer_name' => $manufacturerName,
        ];
    }
}
