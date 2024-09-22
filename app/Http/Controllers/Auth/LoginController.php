<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    // public function register(Request $request)
    // {
    //     $validate = Validator::make($request->all(), [
    //         'name' => 'required|string|max:250',
    //         'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
    //         'password' => 'required|string|min:8|confirmed'
    //     ]);

    //     if($validate->fails()){
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => 'Validation Error!',
    //             'data' => $validate->errors(),
    //         ], 403);
    //     }

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'branch_id' => $request->branch_id,
    //         'role_id' => $request->role_id,
    //         'password' => Hash::make($request->password)
    //     ]);

    //     $data['token'] = $user->createToken($request->email)->plainTextToken;
    //     $data['user'] = $user;

    //     $response = [
    //         'status' => 'success',
    //         'message' => 'User is created successfully.',
    //         'data' => $data,
    //     ];

    //     return response()->json($response, 201);
    // }

    public function login(Request $request) {
        try {
            if (Auth::attempt(['cs_id' => $request->cs_id, 'password' => $request->password])) {
                $branchId = Auth::user()->branch_default;
                Session::put('branch_id', $branchId);
                Toastr::success('Login successfully.', 'Success');
                return redirect('admins/dashboard');
            } else {
                Toastr::error('Wrong UserID OR Password','Error');
                return redirect('login');
            }
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('fail Login','Error');
            return redirect()->back();
        }

    }

    // public function forgotPasswor(Request $request){
    //     $user = User::where('email',$request->email)->first();
    //     if($user)
    //     {
    //         \Mail::to($request->email)->send(new Verify($verifyUser));
    //         return response()->json(['success'=>'Send Meseges Success']);
    //     }else{
    //         return false;
    //     }
    // }
    // // logout a user method
    public function logout(Request $request) {
        // auth()->user()->tokens()->delete();
        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'User is logged out successfully'
        // ], 200);

        Auth::logout();
        Toastr::success('Logout successfully', 'Success');
        return redirect('login');
    }
}
