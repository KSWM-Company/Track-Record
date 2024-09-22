<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),  // Example data
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'created_by' => 1, // Default user for creation
            'updated_by' => 1,
        ];
    }
}
