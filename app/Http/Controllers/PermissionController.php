<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Permission_Category;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        RolePermission($this, 'Permission');
    }

    public function index(){
        $data = DB::table('permissions')
        ->select('permissions.id','permissions.name','permission__categories.name as cat_name')
        ->leftJoin('permission__categories','permission__categories.id','=','permissions.permission_category_id')
        ->get();
        return view('permission.manager_permission.permission_index',compact('data'));
    }
    public function create(){
        $data = Permission_Category::all();
        return view('permission.manager_permission.permission_create',compact('data'));
    }
    public function store(PermissionRequest $request){
        try{
            $data_per = Permission_Category::find($request->permission_category_id);
            $name_permission = $data_per->name;
    
            foreach ($request->permission as $value){
                $check_duplicate = Permission::where('name', $name_permission.' '.$value)->first();
                if(!empty($check_duplicate)){
                    // return redirect()->back()->with('success','Duplicate entry permission: '.$value);
                    DB::rollback();
                    Toastr::warning('Duplicate entry permission'.' '.$value,'Error');
                    return redirect()->back();
                }
            }
    
            foreach ($request->permission as $value){
                Permission::create([
                    'permission_category_id'    => $request->permission_category_id,
                    'name'    => $name_permission.' '.$value,
                    'guard_name'    => 'web'
                ]);
            }
            DB::commit();
            Toastr::success('Create Permission successfully.','success');
            return redirect()->route('permission.index');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create Permission fail', $e->getMessage());
            return redirect()->back();
        }
    }
    public function show($id){
        $data = DB::table('permissions')
            ->select('permissions.id','permissions.name','permission__categories.name as cat_name')
            ->leftJoin('permission__categories','permission__categories.id','=','permissions.permission_category_id')
            ->where('permissions.id',$id)
        ->first();
        return view('permission.manager_permission.permission_show',compact('data'));
    }
    public function edit($id){
        $data_cate = Permission_Category::all();
        $data = Permission::find($id);
        return view('permission.manager_permission.permission_edit',compact('data','data_cate'));
    }
    public function update(PermissionRequest $request, $id){
        try{
            $data_per = Permission_Category::find($request->permission_category_id);
            $name_permission = $data_per->name;
            $check_duplicate = Permission::where('name', $name_permission.' '.$request->permission)->first();
            if(!empty($check_duplicate)){
                DB::rollback();
                Toastr::warning('Duplicate entry permission'. ' '.$request->permission,'Error');
                return redirect()->back();
            }
            $data = Permission::find($id);
            $data->name = $name_permission.' '.$request->permission;
            $data->permission_category_id = $request->permission_category_id;
            $data->save();
            DB::commit();
            Toastr::success('Update Permission successfully.','success');
            return redirect()->route('permission.index');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Update Permission fail', $e->getMessage());
            return redirect()->back();
        }
    }
    public function destroy(Request $request, $id){
        $data = Permission::find($id);
        $data->delete();
        return response()->json(['mg'=>'success'], 200);
    }
    public function permission_destroy_select(Request $request){
        $this->validate($request, [
            'deleteAll' => 'required',
        ]);
        foreach ($request->deleteAll as $value){
            $data = Permission::find($value);
            $data->delete();
        }
        return redirect()->route('permission.index')->with('success','Deleted Permission successfully');
    }
}
