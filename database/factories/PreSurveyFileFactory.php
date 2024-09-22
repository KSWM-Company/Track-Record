<?php

namespace Database\Factories;

use App\Models\PreSurveyFile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PreSurveyFile>
 */
class PreSurveyFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PreSurveyFile::class;
    public function definition()
    {
        return [
            'pre_survey_id' => \App\Models\PreSurvey::factory(),
            'name' => '172529352226.jpeg',
            'full_path' => "http://146.190.89.12/storage/presurvey/files/172529484456.jpeg",
            // 'full_path' => $this->faker->filePath(),
            'created_by' => 1, // Replace with logic if needed
            'updated_by' => 1,
        ];
    }
}
