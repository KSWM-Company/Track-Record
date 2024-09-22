<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CustomersImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new BusinessType([
            'user_id'  => Auth::user()->id,
            'branch_id'  => Auth::user()->branch_id,
            'name'  => $row[0],
            'created_by'  => Auth::user()->id,
        ]);
    }
}

