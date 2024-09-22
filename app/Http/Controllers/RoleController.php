<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\Permission_Category;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function __construct()
    {
        RolePermission($this, 'Role');
    }

    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('permission.roles.index',compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $data_category = Permission_Category::all();
        $permission = Permission::get();
        return view('permission.roles.create',compact('permission','data_category'));
    }

    public function store(RoleRequest $request)
    {
        try{
            $role = Role::create(['guard_name' => 'web','name' => $request->name,'role_type'=>$request->role_type]);
            $permissions = Permission::whereIn('id', $request->permission)->pluck('id','id')->all();
            $role->syncPermissions($permissions);
            DB::commit();
            Toastr::success('Role created successfully.','Success');
            return redirect()->route('roles.index');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create Role fail','Error');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        return view('permission.roles.show',compact('role','rolePermissions'));
    }

    public function edit($id)
    {
        $data_category = Permission_Category::all();
        $role = Role::find($id);
        // $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('permission.roles.edit',compact('role','rolePermissions','data_category'));
    }

    public function update(Request $request, Role $role)
    {
        try{
            $data = $request->all();
            $role->update($data);
            $permissions = Permission::whereIn('id', $request->permission)->get(['name'])->toArray();
            $role->syncPermissions($permissions);
            DB::commit();
            Toastr::success('Role Updated successfully.','Success');
            return redirect()->route('roles.index');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create updated fail','Error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try{
            $data = Role::find($id);
            $data->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
