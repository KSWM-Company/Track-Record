<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=BranchSeeder
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id'  => '1',
                'company_id'  => '1',
                'name_en'  => 'SHV',
                'name_kh'  => 'កំពង់សោម',
                'description'  => 'កំពង់សោម',
                'created_by'  => '1',
            ],
        ];
        foreach ($data as $value) {
            Branch::firstOrCreate($value);
        }
    }
}

