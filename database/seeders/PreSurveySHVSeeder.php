<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PreSurveySHVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an instance of Faker
        $faker = Faker::create();

        // Predefined coordinates for the communes in Preah Sihanouk
        $coordinates = [
            ['lat' => 10.6093, 'lng' => 103.5235], // Sangkat Muoy
            ['lat' => 10.6222, 'lng' => 103.5114], // Sangkat Pir
            ['lat' => 10.6356, 'lng' => 103.5011], // Sangkat Bei
            ['lat' => 10.6400, 'lng' => 103.5086], // Sangkat Buon
        ];

        for ($i = 0; $i < 6000; $i++) {
            // Select a random coordinate
            $randomCoordinate = $faker->randomElement($coordinates);

            $longitude = $faker->longitude(102.9831, 103.8355);
            $latitude = $faker->latitude(10.4483, 10.9465);

            // Insert into table 1
            $preSurveyId = DB::table('pre_surveys')->insertGetId([
                'user_id' => 5, // id 5 David
                'branch_id' => 1,
                'business_type_id' => $faker->numberBetween(1, 5), // Corrected usage
                'sub_category_id' => $faker->numberBetween(1, 10), // Corrected usage
               'location_longitude' => $randomCoordinate['lng'] + $faker->randomFloat(6, -0.01, 0.01),
                'location_latitude' => $randomCoordinate['lat'] + $faker->randomFloat(6, -0.01, 0.01),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Insert into table 2
            DB::table('pre_survey_files')->insert([
                'pre_survey_id' => $preSurveyId,
                'name' => '172395222063.jpeg',
                'full_path' => 'http://146.190.89.12/storage/survey/files/172395222063.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
