<?php

namespace App\Imports;

use App\Models\SubCategory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;

class SubCategoryImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $i = 0;
        foreach ($rows as $key => $item) {
            $i++;
           
            if ($i != 1) {
                SubCategory::firstOrCreate([
                    'user_id'  => Auth::user()->id,
                    'branch_id'  => Auth::user()->branch_id,
                    'business_type_id'  => $item[0],
                    'category_id'  => $item[1],
                    'name'  => $item[2],
                    'unit'  => $item[3] ?? "",
                    'monthly_fee'  => $item[4],
                    'land_filed_fee'  => $item[5],
                    'total_fee'  => $item[6],
                    'noted'  => $item[7],
                    'created_by'  => Auth::user()->id,
                ]);
            }
        }
    }
}
