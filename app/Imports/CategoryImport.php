<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;

class CategoryImport implements ToCollection
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
                Category::firstOrCreate([
                    'user_id'  => Auth::user()->id,
                    'branch_id'  => Auth::user()->branch_id,
                    'business_type_id'  => $item[0],
                    'name'  => $item[1],
                    'created_by'  => Auth::user()->id,
                ]);
            }
        }
    }
}
