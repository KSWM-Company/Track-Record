<?php

namespace App\Http\Controllers;

use App\Models\BusinessType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\BusinessTypeImport;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\BusinessTypeRequest;
use App\Http\Resources\BusindessTypeResource;

class BusinessTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * php artisan make:import BusinessTypeImport --model=BusinessType
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        RolePermission($this, 'Business Type');
    }
    public function index()
    {
        $branchId = Session::get('branch_id');
        if (Auth::user()->RolePermission =='Staff') {
            $data = BusinessType::where('user_id',Auth::user()->id)->where('branch_id',$branchId)->get();
        } else {
            $data = BusinessType::all();
        }
        return view('business_type.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessTypeRequest $request)
    {
        try{
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['branch_id'] = Auth::user()->branch_id;
            $data['created_by'] = Auth::user()->id;
            BusinessType::create($data);
            DB::commit();
            Toastr::success('Create Business Type Successfull.','Success');
            return redirect('admins/business-type');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create Business Type fail','Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $data = BusinessType::find($id);
            return response()->json([
                'success'=>$data
            ]);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessType $businessType)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            BusinessType::where('id',$request->id)->update([
                'user_id' => Auth::user()->id,
                'name'  => $request->name,
                'branch_id' => Auth::user()->branch_id,
                'updated_by' => Auth::user()->id,
            ]);
            DB::commit();
            Toastr::success('Updated Business Type Successfull.','Success');
            return redirect('admins/business-type');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Updated Business Type fail','Error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessType  $businessType)
    {
        try{
            $businessType->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function importBusinessType(Request $request){
        try{
            $request->validate([
                'file' => 'required|mimes:xlsx,xls',
            ]);
            $extension = $request->file('file')->extension();
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                Excel::import(new BusinessTypeImport, $request->file('file'));
            }
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
 }
