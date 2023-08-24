<?php

namespace Database\Factories;


use App\Models\Car;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     */
    protected $model = Car::class;
    public function definition(): array
    {

            {
                return [
                    'owner' => $this->faker->name,
                    'manufacturer_id' => rand(1,6),
                    'type_id' => rand(1,6),
                    'price' => $this->faker->numberBetween(10000, 50000),
                ];
            }


}
}



