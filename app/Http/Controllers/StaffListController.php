<?php

namespace App\Http\Controllers;


use App\Models\StaffList;
use Illuminate\Http\Request;
use App\Imports\BranchImport;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StaffListRequest;

class StaffListController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * php artisan make:import BranchImport --model=Branch
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        RolePermission($this, 'Staff');
    }
    // get all crud for apply all function
    private function getAllData(){
        return StaffList::all();
    }

    public function index()
    {
        return view('staff_list.index')->with('data', $this->getAllData());
    }

    public function create()
    {
        $data = StaffList::all();
        return view('staff_list.create',compact('data'));
    }

    public function store(StaffListRequest $request)
    {

        if($request->hasFile('profile')) {
            $image = $request->file('profile');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('images/profilesstaff'), $filename);
        }else{
            $filename = "";
        }
        try{

            StaffList::create([
                'profile'  => $filename,
                'name'  => $request->name,
                'sex'  => $request->sex,
                'phone_number'  => $request->phone_number,
                'position'  => $request->position,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            Toastr::success('Create Staff List successfully.','Success');
            return redirect('admins/staff-list');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create Staff List fail','Error');
            return redirect()->back();
        }
    }
    public function show($id)
    {
        try{
            $data = StaffList::find($id);
            return view('staff_list.edit',compact('data'));
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try{
            if($request->hasFile('profile')) {
                $image = $request->file('profile');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('images/profilesstaff'), $filename);
            }else{
                $filename = $request->old_profile;
            }
            StaffList::where('id',$request->id)->update([
                'profile'  => $filename,
                'name'  => $request->name,
                'sex'  => $request->sex,
                'phone_number'  => $request->phone_number,
                'position'  => $request->position,
                'updated_by' => Auth::user()->id,
            ]);
            DB::commit();
            Toastr::success('Updated Staff List Successfull.','Success');
            return redirect('admins/staff-list');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Updated Staff List fail','Error');
            return redirect()->back();
        }
    }


    public function destroy(StaffList $staffList)
    {
        try{
            $staffList->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}

