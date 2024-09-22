<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function district(Request $request){
        $district = DB::table('tb_district')->where('province_code',$request->province_code)->get();
        return response()->json(['data'=>$district]);
    }
    public function commune(Request $request)
    {
        $communes = DB::table('tb_commune')->where('district_code',$request->district_code)->get();
        return response()->json(['data'=>$communes]);
    }
    public function village(Request $request)
    {
        $villages = DB::table('tb_village')->where('commune_code',$request->commune_code)->get();
        return response()->json(['data'=>$villages]);
    }
}
