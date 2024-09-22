<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\BusinessType;
use App\Models\LocationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LocationCodeRequest;


class LocationCodeController extends Controller
{
    public function index()
    {
        $branchId = Session::get('branch_id');
        if (Auth::user()->RolePermission =='Staff') {
            $data = LocationCode::where('user_id',Auth::user()->id)->where('branch_id',$branchId)->get();
        } else {
            $data = LocationCode::all();
        }
        return view('location_code.index',compact('data'));
    }

    public function create()
    {
        $branch = Branch::all();
        return view('location_code.create',compact('branch'));
    }

    public function store(LocationCodeRequest $request)
    {
        try{
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['branch_id'] = Auth::user()->branch_id;
            $data['created_by'] = Auth::user()->id;
            LocationCode::create($data);
            DB::commit();
            Toastr::success('Create location code Successfull.','Success');
            return redirect('admins/location-code');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create location code fail','Error');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        try{
            $data = LocationCode::find($id);
            // return view('payment_types.edit',compact('data'));
            return response()->json([
                'success'=>$data
            ]);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try{
            LocationCode::where('id',$request['id'])->update([
                'user_id' => Auth::user()->id,
                'branch_id' => Auth::user()->branch_id,
                'name'  => $request->name,
                'type'  => $request->type,
                'updated_by' => Auth::user()->id,
            ]);
            DB::commit();
            Toastr::success('Updated location code Successfull.','Success');
            return redirect('admins/location-code');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Updated location code fail','Error');
            return redirect()->back();
        }
    }

    public function destroy(LocationCode $location_code)
    {
        try{
            $location_code->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
