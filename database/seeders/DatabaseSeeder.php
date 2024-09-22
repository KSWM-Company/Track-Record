<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *php artisan migrate --seed
     * php artisan db:seed --class=DatabaseSeeder
     * @return void
     */
    public function run()
    {
        $this->call([
            BranchSeeder::class,
            BusinessTypeSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            LocationCodeSeeder::class,
            UserPermissionSeeder::class,

        ]);
    }
}
