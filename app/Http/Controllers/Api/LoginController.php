<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validate($request,[
            'password'=>'required'
        ]);
        
        try{
            $credentials = $request->only('cs_id', 'password');
            if(isset($request->cs_id)){
                $credentials = $request->only('cs_id', 'password');
            }
            if (Auth::attempt($credentials)) {
                $branchId = Auth::user()->branch_default;
                Session::put('branch_id', $branchId);
                // Generate a token if a device is provided
                if ($request->device) {
                    $token = Auth::user()->createToken($request->device)->plainTextToken;
                }
                $data = Auth::user();
                $response = [
                    'success' => true,
                    'message' => 'User Loing successfully.',
                    'data' => $data,
                    'token' =>$token
                ];
                return response()->json($response, 200);
            }else if(!Auth::attempt($credentials)){
                $response = [
                    'success' => false,
                    'message' => 'Invalidate CS-ID or Password',
                    'status'  => '401'
                ];
                return response()->json($response, 401);
            }else{
                Auth::logout();
                $response = [
                    'success' => false,
                    'message' => 'Account not activate',
                    'status'  => '401'
                ];
                return response()->json($response, 401);
            }
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Invalidate CS-ID or Password',
                'status'  => '401'
            ];
            return response()->json($response, 401);
        }
    }

    public function logout(Request $request){
        try{
            Auth::logout();
            return response()->json([
                'success' => true,
                'message' => 'User is logged out successfully'
            ], 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'log out file',
                'status'  => '201'
            ];
            return response()->json($response, 201);
        }
        // Auth::logout();
        // return true;
    }
}
