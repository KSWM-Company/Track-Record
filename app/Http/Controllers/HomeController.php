<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Survey;
use App\Models\Company;
use App\Models\PreSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $branchId = Session::get('branch_id');
        $users = User::with('branches')
        ->leftJoin('roles','users.role_id','=','roles.id')
        ->leftJoin('branches','users.branch_default','=','branches.id')
        ->select(
            'users.*',
            'roles.name as role_name',
            'branches.name_kh as branch_name_default_kh',
            'branches.name_en as branch_name_default_en',
        )->orderBy('users.id', 'DESC')->get();

        $preSurvey = PreSurvey::leftJoin('sub_categories','pre_surveys.sub_category_id','=','sub_categories.id')
        ->select(
            'pre_surveys.id',
            'pre_surveys.branch_id',
            'pre_surveys.user_id',
            'pre_surveys.business_type_id',
            'pre_surveys.sub_category_id',
            'sub_categories.total_fee',
        )->where('pre_surveys.branch_id',$branchId)->get();
        // dd($preSurvey);
        $survey = Survey::where('branch_id',$branchId)->get();
        return view('dashboards.index',compact('users','preSurvey','survey'));
    }
}
