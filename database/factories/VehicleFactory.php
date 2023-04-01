<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'date_acquired' => $this->faker->date,
            'license_plate_number' => $this->faker->name,
            'parking_location' => $this->faker->streetName,
            'worker_id' => random_int(1,3)
        ];
    }
}
