<?php

namespace Database\Seeders;

use App\Models\BusinessType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=BusinessTypeSeeder
     * @return void
     */
    public function run()
    {
        $data = [
            [
                /* 1 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'លំនៅឋាន',
                'created_by'  => '1',
            ],
            [
                 /* 2 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'ទីតំាងអាជីវកម្មទូទៅ',
                'created_by'  => '1',
            ],
            [
                /* 3 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'សណ្ឋាគារ រីសត បឹងហ្គាឡូ និងផ្ទះសំណាក់',
                'created_by'  => '1',
            ],
            [
                /* 4 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'កីឡាដ្ឋាន ក្លឹបហាត់ប្រាណ ហាងម៉ាស្សា ស្ទីម សូណា(គិតផ្ទៃអគារ)',
                'created_by'  => '1',
            ],
            [
                /* 5 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'មណ្ឌលកម្សាន្ត',
                'created_by'  => '1',
            ],
            [
                /* 6 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'មជ្ឍមណ្ឌលពាណិជ្ជកម្ម/លក់ដូរ',
                'created_by'  => '1',
            ],
            [
                /* 7 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'មន្ទីរពេទ្យ(ឯកជន-ស្វ័យត)',
                'created_by'  => '1',
            ],
            [
                /* 8 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'គ្រិះស្ថានអប់រំឯកជន-ស្វ័យត/អង្កការ',
                'created_by'  => '1',
            ],
            [
                /* 9 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'គ្រិះស្ថានអប់រំរដ្ឋ',
                'created_by'  => '1',
            ],
            [
                /* 10 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'ក្រុមហ៊ុនឯកជន',
                'created_by'  => '1',
            ],
            [
                /* 11 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'ស្ថានីយ-ដេប៉ូប្រេងឥន្ធនៈ',
                'created_by'  => '1',
            ],
            [
                /* 12 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'យានដ្ឋានជួសជុលរថយន្ត ទីតំាងលាងរថយន្ត​មជ្ឍមណ្ឌលថែទំារថយន្ត-យានយន្ត (គិតផ្ទៃអគារ)',
                'created_by'  => '1',
            ],
            [
                /* 13 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'ទីតំាងស្តុក/ផ្ទុកទំនិញ',
                'created_by'  => '1',
            ],
            [
                /* 14 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'រោងចក្រ សិប្បកម្ម',
                'created_by'  => '1',
            ],
            [
                /* 15 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'ស្ថានទូត-កុងស៊ុល-អង្គការ',
                'created_by'  => '1',
            ],
            [
                /* 16 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'ស្ថានប័នរដ្ឋ/អង្គភាពរដ្ឋ',
                'created_by'  => '1',
            ],
            [
                /* 17 */
                'user_id'  => '1',
                'branch_id'  => '1',
                'name'  => 'ផ្សេរងៗ',
                'created_by'  => '1',
            ],
        ];
        foreach ($data as $value) {
            BusinessType::firstOrCreate($value);
        }
    }
}

