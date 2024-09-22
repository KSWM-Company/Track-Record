<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Imports\BranchImport;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BranchRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BranchController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * php artisan make:import BranchImport --model=Branch
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        RolePermission($this, 'Branch');
    }

    public function index()
    {
        if (Auth::user()->RolePermission =='Staff') {
            $data = Branch::leftJoin('user_branches','branches.id','=','user_branches.branch_id')
            ->where('user_branches.user_id',Auth::user()->id)->get();
        } else {
            $data = Branch::all();
        }
        return view('branch.index',compact('data'));
    }

    public function create()
    {
        $branch = Branch::all();
        return view('branch.create',compact('branch'));
    }

    public function store(BranchRequest $request)
    {
        try{
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['company_id'] = 1;
            $data['created_by'] = Auth::user()->id;
            Branch::create($data);
            DB::commit();
            Toastr::success('Create Branch Successfull.','Success');
            return redirect('admins/branch');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create Branch fail','Error');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        try{
            $data = Branch::find($id);
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
            Branch::where('id',$request->id)->update([
                'name_kh'  => $request->name_kh,
                'name_en'  => $request->name_en,
                'description'  => $request->description,
                'company_id'  => 1,
                'user_id' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ]);
            DB::commit();
            Toastr::success('Updated Branch Successfull.','Success');
            return redirect('admins/branch');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Updated Branch fail','Error');
            return redirect()->back();
        }
    }

    public function switchBranch(Request $request)
    {
        $branchId = $request->input('branch_id');
        // Check if the branch ID belongs to the authenticated user
        $user = Auth::user();
        if ($user->branches()->where('branch_id', $branchId)->exists()) {
            // Set the new branch ID in session
            Session::put('branch_id', $branchId);
            DB::commit();
            Toastr::success('Branch switched successfully!','Success');
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Failed to change branch.');
        }
    }
    public function destroy(Branch $branch)
    {
        try{
            $branch->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
