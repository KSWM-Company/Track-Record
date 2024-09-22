<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Traits\Generate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use Generate;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        RolePermission($this, 'User');
    }
    public function index()
    {
        // Define the base query
        $query = User::leftJoin('roles','users.role_id','=','roles.id')
        ->select(
            'users.*',
            'roles.name as role_name',
        );
        // Apply additional filtering for 'Staff' role
        // Auth::user()->hasRole('Staff')
        if (Auth::user()->RolePermission == 'Staff') {
            $query->where('users.id', Auth::user()->id)->where('users.role_id',Auth::user()->role_id);
        }
        // Fetch paginated data
        $data = $query->orderBy('users.id', 'DESC')->get();
        return view('users.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $UserID = $this->GenerateUserID();
        $role = Role::all();
        return view('users.create',compact('UserID','role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // DB::beginTransaction();
        // try{
            if($request->hasFile('profile')) {
                $image = $request->file('profile');
                $filename = $image->getClientOriginalName();
                $full_path = url("storage/users/profiles/".$filename);
                $image->move(public_path('storage/users/profiles'), $filename);
            }else{
                $full_path = "";
            }

            $user = User::create([
                'cs_id'  => $this->GenerateUserID(),
                'role_id'  => $request->role_id,
                'profile'  => $full_path,
                'name'  => $request->name,
                'email'  => $request->email,
                'password'  => Hash::make($request->password),
                'sex'  => $request->sex,
                'date_of_birth'  => Carbon::createFromDate($request->date_of_birth)->format('Y-m-d'),
                'created_by'  => Auth::user()->id,
            ]);
            $roleName = Role::find($request->role_id)->name;
            $user->assignRole($roleName);
            DB::commit();
            Toastr::success('Create Users successfully.','Success');
            return redirect('admins/users');
        // }catch(\Exception $e){
        //     DB::rollback();
        //     Toastr::error('Create Users fail','Error');
        //     return redirect()->back();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        try{
            $user = User::where('id',$user->id)->first();
            $role = Role::all();
            return view('users.edit',compact('user','role'));
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try{
            if($request->hasFile('profile')) {
                $image = $request->file('profile');
                $filename = $image->getClientOriginalName();
                $full_path = url("storage/users/profiles/".$filename);
                $image->move(public_path('storage/users/profiles'), $filename);
            }else{
                $full_path = $request->old_profile;
            }

            $data = $request->all();
            $data['profile']    = $full_path;
            $data['cs_id']    = $request->cs_id;
            $data['role_id']    = $request->role_id;
            $data['name']   = $request->name;
            $data['email']  = $request->email;
            $data['password']   = $request->password == null ? $request->old_password : Hash::make($request->password);
            $data['date_of_birth']  = Carbon::createFromDate($request->date_of_birth)->format('Y-m-d');
            $data['updated_by'] = Auth::user()->id;
            $user = User::find($request->id);
            if ($user) {
                $user->update($data);
                // Find the role by ID and get its name
                $role = Role::find($request->role_id);
                if ($role) {
                    $user->syncRoles($role->name); // Use the role name
                } else {
                    Toastr::error('Updated Users fail','Error');
                }
            }
            DB::commit();
            Toastr::success('Updated Users successfully.','Success');
            return redirect('admins/users');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Updated Users fail','Error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $user)
    {
        // try{
        //     $user->delete();
        //     return response()->json(['mg'=>'success'], 200);
        // }catch(\Exception $e){
        //     return response()->json(['error'=>$e->getMessage()]);
        // }
    }
    // public function profile(Request $request){
    //     $data = User::with('branches')
    //     ->leftJoin('roles','users.role_id','=','roles.id')
    //     ->leftJoin('branches','users.branch_default','=','branches.id')
    //     ->select(
    //         'users.*',
    //         'roles.name as role_name',
    //         'branches.name_kh as branch_name_default_kh',
    //         'branches.name_en as branch_name_default_en',
    //     )->where('users.id',$request->id)->first();
    //     // dd($data);
    //     return view('users.profile',compact('data'));
    // }
    // public function onchangeRole(Request $request){
    //     try{
    //         User::where('role_id',$request->role_id)->update([
    //             'role_id' => $request->role_id
    //         ]);
    //         DB::commit();
    //         return ['message' => 'successfull'];
    //     }catch(\Exception $e){
    //         DB::rollback();
    //         Toastr::error('Change user role fail','Error');
    //         return redirect()->back();
    //     }
    // }
}
