<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PreSurvey>
 */
class PreSurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => '1', // Assuming you have a User model
            'branch_id' => 1,
            'block_id' => $this->faker->numberBetween(1, 5),
            'sector_id' => $this->faker->numberBetween(1, 5),
            'street_id' => $this->faker->numberBetween(1, 5),
            'side_of_street_id' => $this->faker->numberBetween(1, 5),
            'business_type_id' => $this->faker->numberBetween(1, 5),
            'sub_category_id' => $this->faker->numberBetween(1, 10),
            'location_longitude' => $this->faker->longitude(),
            'location_latitude' => $this->faker->latitude(),
            'link_map' => $this->faker->url(),
            'created_by' => 1, // Replace with logic if needed
            'updated_by' => 1,
            'deleted_at' => null,
            'delete_by' => null,
        ];
    }
}
