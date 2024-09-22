<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Permission_Category;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\PermissionCategoryRequest;

class PermissionCategoryController extends Controller
{
    function __construct()
    {
        RolePermission($this, 'Permission Category');
    }

    public function index( ){
        $data = Permission_Category::all();
        return view('permission.permission_category.permission_category_index',compact('data'));
    }
    public function create( ){
        return view('permission.permission_category.permission_category_create');
    }
    public function store(PermissionCategoryRequest $request){
        try{
            Permission_Category::create($request->all());
            DB::commit();
            Toastr::success('Create Permission Category successfully.','success');
            return redirect()->back();
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create Permission Category fail', $e->getMessage());
            return redirect()->back();
        }
    }
    public function show($id){
        try{
            $data = Permission_Category::find($id);
            return response()->json([
                'success'=>$data
            ]);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function edit($id){
        $data = Permission_Category::find($id);
        return view('permission.permission_category.permission_category_edit',compact('data'));
    }
    public function update(Request $request, $id){
        try{
            Permission_Category::where('id',$request->id)->update([
                'name'  =>$request->name
            ]);
            DB::commit();
            Toastr::success('Update Permission Category successfully.','success');
            return redirect()->back();
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Update Permission Category fail', $e->getMessage());
            return redirect()->back();
        }
    }
    public function destroy($id){
        try{
            $data = Permission_Category::find($id);
            $data->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function permission_category_destroy_select(Request $request){
        try{
            $this->validate($request, [
                'id_delete' => 'required',
            ]);
            foreach ($request->id_delete as $value){
                $data = Permission_Category::find($value);
                $data->delete();
            }
            return redirect()->route('permission_category.index')->with('success','Deleted Permission successfully');
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
