<?php

namespace App\Imports;

use App\Models\Branch;
use App\Imports\BranchImport;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class BranchImport implements ToModel
{
     /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Branch([
            'user_id'  => Auth::user()->id,
            'branch_code'  => Auth::user()->branch_id,
            'description'  => $row[0],
            'created_by'  => Auth::user()->id,
        ]);
    }
}
