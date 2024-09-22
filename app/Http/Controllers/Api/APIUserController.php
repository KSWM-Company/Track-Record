<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Helpers\Helper;
use App\Models\UserBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class APIUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data = User::with('branches')
            ->leftJoin('roles','users.role_id','=','roles.id')
            ->select(
                'users.*',
                'roles.name as role_name'
            )->orderBy('id','DESC')->get();
            $response = [
                'success' => true,
                'message' => 'Get Date User successfully.',
                'data' => $data
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date Users not foud',
                'status'  => 201
            ];
            return response()->json($response, 201);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('profile')) {
            $image = $request->file('profile');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('images/profiles'), $filename);
        }else{
            $filename = "";
        }
        try{
            User::create([
                'profile'  => $filename,
                'name'  => $request->name,
                'email'  => $request->email,
                'password'  => Hash::make($request->password),
                'branch_id'  => $request->branch_id,
                'role_id'  => $request->role_id,
                'created_by'  => Auth::user()->id,
            ]);
            return response()->json(['success'=>'Users Create Successfull']);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
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
            return response()->json($user);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try{
            if(Helper::http_image($request->profile)){
                $fileName = $request->profile;
            }else if(Helper::is_base64($request->profile)){
                $path = Helper::get_user_profile_path();
                $full_path = Helper::upload_user_base64($request->profile,$path);
            }else{
                $full_path = '';
            }
            $user = User::where('id',$request->id)->update([
                'profile' => $full_path,
                'cs_id'  => $request->cs_id,
                'name'  => $request->name,
                'email'  => $request->email,
                'role_id' => Auth::user()->role_id,
                'date_of_birth' => $request->date_of_birth,
                'sex' => $request->sex,
                'updated_by' => Auth::user()->id,
            ]);
            if ($user) {
                if ($request->branches) {
                    UserBranch::where('user_id', $request->id)->delete();
                    foreach ($request->branches as $value) {
                        UserBranch::create([
                            'user_id'  => $value['user_id'],
                            'branch_id'  => $value['branch_id'],
                            'updated_by'  => Auth::user()->id,
                        ]);
                    }
                }
            }
            $response = [
                'success' => true,
                'message' => 'Users Update Successfull.'
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
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
        try{
            $user->delete();
            return response()->json([
                'status'=>'Delete User Successfull'
            ]);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function profile(Request $request)
    {
        try{
            $data = User::with('branches')
            ->leftJoin('roles','users.role_id','=','roles.id')
            ->select(
                'users.*',
                'roles.name as role_name'
            )->where('users.id',$request->id)->orderBy('users.id','DESC')->first();
            $response = [
                'success' => true,
                'message' => 'Get Date User Profile successfully.',
                'data' => $data
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date Users Profile not foud',
                'status'  => 201
            ];
            return response()->json($response, 201);
        }
    }
    public function userChangePassword(Request $request){
        try{
            User::where("id",$request->id)->update([
                'password'  => Hash::make($request->new_password)
            ]);
            $response = [
                'success' => true,
                'message' => 'Users change password successfully.',
                'data' => null
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Users change passowrd fial.',
                'status'  => 201
            ];
            return response()->json($response, 201);
        }
    }
}
