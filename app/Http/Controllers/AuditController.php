<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AuditController extends Controller
{
    public function loadData(){
        if (request()->ajax()) {
            $query = DB::table('activity_log');
            return DataTables::of($query)->make(true);
        }
        return view('user_log.index');
    }
}
