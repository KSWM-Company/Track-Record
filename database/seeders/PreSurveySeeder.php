<?php

namespace Database\Seeders;

use App\Models\PreSurvey;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PreSurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=PreSurveySeeder
     *
     * @return void
     */
    public function run()
    {
        //Create 20,000 pre_surveys, each with 3 associated pre_survey_files
        PreSurvey::factory()
        ->hasFiles(3) // You can adjust the number of files here
        ->count(5000)
        ->create();
    }
    
}
