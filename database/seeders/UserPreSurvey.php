<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserBranch;

class UserPreSurvey extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /**
     * Run the database seeds.
     * php artisan db:seed --class=userPreSurvey
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'cs_id' => 'CS-002',
                'name' => 'Chhun Sophat',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs2@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-003',
                'name' => 'Touch Mao',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-004',
                'name' => 'Sok Piseth',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-005',
                'name' => 'Sem Sovandy',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-006',
                'name' => 'Hon Thaikor',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-007',
                'name' => 'Heng Pheakdey',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-008',
                'name' => 'Sambat Mounthai',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-009',
                'name' => 'Phan Somnang',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-010',
                'name' => 'Tieng Vichay',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-011',
                'name' => 'Chhuon Khna',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-012',
                'name' => 'Yeav Pheak',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-013',
                'name' => 'Phoueng Sela',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-014',
                'name' => 'Eng Rat',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-015',
                'name' => 'Sarath Vanna',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-016',
                'name' => 'Sambat Kimhak',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-017',
                'name' => 'Vorn Thea',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-018',
                'name' => 'Ben Koemly',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-019',
                'name' => 'Chorn Sophearen',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-020',
                'name' => 'Meas Sreybol',
                'sex' => 2,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ],
            [
                'cs_id' => 'CS-021',
                'name' => 'Yul Sokhoeun',
                'sex' => 1,
                'date_of_birth' => '1995-09-02',
                'role_id' => 1,
                'branch_default' => 1,
                'email' => 'cs@cs.com',
                'password' => Hash::make('A12345')
            ]
        ];

        foreach ($data as $value) {
            $user = User::firstOrCreate($value);
            UserBranch::firstOrCreate([
                'user_id'=> $user->id,
                'branch_id'=> 1,
                'created_by'=> 1
            ]);
        }
    }
}
