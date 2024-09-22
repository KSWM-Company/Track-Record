<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\SurveyDetail;
use App\Models\PreSurvey;
use App\Models\PreSurveyFile;
use App\Models\User;
use App\Models\LocationCode;
use Carbon\Carbon;

class MapController extends Controller
{

    #region Web
    public function showMapSurvey()
    {
        $locations = SurveyDetail::where('delete_by', null)->get();
        $users = User::where('deleted_at', null)->get();
        return view('map.survey_map', compact('locations', 'users'));
    }
    public function showMapCustomer()
    {
        $locations = SurveyDetail::where('delete_by', null)->get();
        $users = User::where('deleted_at', null)->get();
        return view('map.customer_map', compact('locations', 'users'));
    }
    public function showMapPreSurvey()
    {
        $users = User::where('deleted_at', null)->get();
        $all_data = LocationCode::where('deleted_at', null)->get();
        // Use the collection's filter method to filter by type
        $blocks = $all_data->filter(function ($item) {
            return $item->type === 'Block';
        });
        $sectors = $all_data->filter(function ($item) {
            return $item->type === 'Sector';
        });
        $streets = $all_data->filter(function ($item) {
            return $item->type === 'Street';
        });
        $side_of_streets = $all_data->filter(function ($item) {
            return $item->type === 'Site_of_Street';
        });
        return view('map.pre_survey_map', compact('users', 'blocks', 'sectors', 'streets', 'side_of_streets'));
    }
    public function showMapPreSurveyById($id)
    {
        $locations = PreSurvey::with('PreSurveyFile')->where('id', $id)->first();
        return view('map.pre_survey_single_map', compact('locations'));
    }

    #region API
    public function getFilterSurvey(Request $request)
    {
        $user_id = $request->input('user_id');
        $locations = SurveyDetail::query()
            ->when($user_id, function($query, $user_id) {
                return $query->where('created_by', $user_id);
            })
            ->get();
        return response()->json($locations);
    }
    public function getFilterCustomer(Request $request)
    {
        $user_id = $request->input('user_id');
        $locations = SurveyDetail::query()
            ->when($user_id, function($query, $user_id) {
                return $query->where('created_by', $user_id);
            })
            ->get();
        return response()->json($locations);
    }
    public function getFilterPreSurvey(Request $request)
    {
        $block = $request->input('block');
        $sector = $request->input('sector');
        $street = $request->input('street');
        $side_of_street = $request->input('side_of_street');
        $user_id = $request->input('user_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $locations = PreSurvey::with('PreSurveyFile')
        ->leftJoin('users', 'pre_surveys.user_id', '=', 'users.id')
        ->leftJoin('branches', 'pre_surveys.branch_id', '=', 'branches.id')
        ->leftJoin('categories', 'pre_surveys.business_type_id', '=', 'categories.id')
        ->leftJoin('sub_categories', 'pre_surveys.sub_category_id', '=', 'sub_categories.id')
        ->leftJoin('location_codes as block', 'pre_surveys.block_id', '=', 'block.id')
        ->leftJoin('location_codes as sector', 'pre_surveys.sector_id', '=', 'sector.id')
        ->leftJoin('location_codes as street', 'pre_surveys.street_id', '=', 'street.id')
        ->leftJoin('location_codes as side_of_street', 'pre_surveys.side_of_street_id', '=', 'side_of_street.id')
        ->select(
            'pre_surveys.*',
            'block.name as block_name',
            'sector.name as sector_name',
            'street.name as street_name',
            'side_of_street.name as side_of_street_name',
            'users.name as user_name',
            'branches.name_en as branch_name_en',
            'branches.name_kh as branch_name_kh',
            'categories.name as category_name',
            'sub_categories.name as sub_category_name'
        )
        ->where('pre_surveys.branch_id', Session::get('branch_id'))
        ->where('pre_surveys.delete_by', null)
        ->when($block, function ($query, $block) {
            return $query->where('pre_surveys.block_id', $block);
        })
        ->when($sector, function ($query, $sector) {
            return $query->where('pre_surveys.sector_id', $sector);
        })
        ->when($street, function ($query, $street) {
            return $query->where('pre_surveys.street_id', $street);
        })
        ->when($side_of_street, function ($query, $side_of_street) {
            return $query->where('pre_surveys.side_of_street_id', $side_of_street);
        })
        ->when($user_id, function ($query, $user_id) {
            return $query->where('pre_surveys.user_id', $user_id);
        })
        ->when($start_date, function ($query, $start_date) {
            return $query->where('pre_surveys.created_at', '>=', $start_date);
        })
        ->when($end_date, function ($query, $end_date) {
            return $query->where('pre_surveys.created_at', '<=', Carbon::parse($end_date)->endOfDay());
        });
        // Apply additional filtering for 'Staff' role
        if (Auth::user()->RolePermission == 'Staff') {
            $locations->where('pre_surveys.user_id', Auth::user()->id);
        }
        $locations = $locations->get();

        return response()->json($locations);
    }
    public function viewImage($id){
        return response()->json(PreSurveyFile::where('pre_survey_id', $id)->get(), 200);
    }

}
