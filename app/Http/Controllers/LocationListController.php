<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\BusinessType;
use App\Models\LocationList;
use App\Models\SurveyDetail;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\SurveyBusinessType;
use Illuminate\Support\Facades\DB;

class LocationListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        RolePermission($this, 'Location List');
    }
    public function index()
    {
        $data = SurveyDetail::all();
        return view('location_list.index',compact('data'));
    }
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocationList  $locationList
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // Fetching the survey detail based on the provided id
          $data = SurveyDetail::where('id', $request->id)->first();
          // Fetching the business types and related information for the survey detail
          $businessTypes = DB::table('survey_business_types')
              ->leftJoin('business_types', 'survey_business_types.business_type_id', '=', 'business_types.id')
              ->leftJoin('categories', 'survey_business_types.category_id', '=', 'categories.id')
              ->leftJoin('sub_categories', 'survey_business_types.sub_category_id', '=', 'sub_categories.id')
              ->leftJoin('users', 'survey_business_types.created_by', '=', 'users.id')
              ->select(
                  'survey_business_types.*',
                  'business_types.name as business_type_name',
                  'categories.name as categorie_name',
                  'sub_categories.name as sub_categorie_name',
                  'users.name as created_by_name'
              )
              ->where('survey_detail_id', $request->id)
              ->get();

          // Returning the view with both the survey detail and the business types data
          return view('location_list.edit', compact('data', 'businessTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocationList  $locationList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocationList $locationList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocationList  $locationList
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocationList $locationList)
    {
        //
    }

    public function locationListEdit(Request $request)
    {
        // Fetching the survey detail based on the provided id
        $data = SurveyDetail::where('id', $request->id)->first();
        // Fetching the business types and related information for the survey detail
        $businessTypes = DB::table('survey_business_types')
            ->leftJoin('business_types', 'survey_business_types.business_type_id', '=', 'business_types.id')
            ->leftJoin('categories', 'survey_business_types.category_id', '=', 'categories.id')
            ->leftJoin('sub_categories', 'survey_business_types.sub_category_id', '=', 'sub_categories.id')
            ->leftJoin('users', 'survey_business_types.created_by', '=', 'users.id')
            ->select(
                'survey_business_types.*',
                'business_types.name as business_type_name',
                'categories.name as categorie_name',
                'sub_categories.name as sub_categorie_name',
                'users.name as created_by_name'
            )
            ->where('survey_detail_id', $request->id)
            ->get();

        // Returning the view with both the survey detail and the business types data
        return view('location_list.edit', compact('data', 'businessTypes'));
    }

    public function locationCodeSearch(Request $request): JsonResponse{
        try{
            $search = $request->location_code;
            $data = DB::table("survey_details")->select("id","location_code")->where('location_code','LIKE',"%$search%")->pluck('location_code');
            return response()->json($data);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function locationCodeFilter(Request $request){
        try{
            $data = SurveyDetail::where('location_code',$request->search)->first();
            $surveyDetail = SurveyDetail::where('location_code',$request->search)->get();

            foreach ($surveyDetail as $item) {
                $surveyBusinessType = DB::table('survey_business_types')
                ->leftJoin('business_types','survey_business_types.business_type_id','=','business_types.id')
                ->leftJoin('categories','survey_business_types.category_id','=','categories.id')
                ->leftJoin('sub_categories','survey_business_types.sub_category_id','=','sub_categories.id')
                ->select(
                    'survey_business_types.*',
                    'business_types.name as business_type',
                    'categories.name as categorie',
                    'sub_categories.name as sub_categorie',
                )->where('survey_detail_id',$item->id)->get();
            }
            return response()->json(['data'=>$data,'surveyBusinessType'=>$surveyBusinessType]);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
