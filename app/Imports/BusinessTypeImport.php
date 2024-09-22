<?php

namespace App\Imports;

use App\Models\BusinessType;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class BusinessTypeImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $rows)
    {
        $i = 0;
        foreach ($rows as $key => $item) {
            $i++;
            if ($i != 1) {
                BusinessType::firstOrCreate([
                    'user_id'  => Auth::user()->id,
                    'branch_id'  => Auth::user()->branch_id,
                    'name'  => $item[0],
                    'created_by'  => Auth::user()->id,
                ]);
            }
        }
    }
}
