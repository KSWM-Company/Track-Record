<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Models\PreSurvey;
use Illuminate\Http\Request;
use App\Models\PreSurveyFile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PerSurveyRequest;
use Illuminate\Support\Facades\Log;

class PreSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            if(isset($request->per_page)){
                $per_page=$request->per_page;
            }else{
                $per_page=10;
            }
            $branchId = Auth::user()->branch_default;
            // Define the base query
            $query = PreSurvey::with('PreSurveyFile')
            ->leftJoin('users', 'pre_surveys.user_id', '=', 'users.id')
            ->leftJoin('branches', 'pre_surveys.branch_id', '=', 'branches.id')
            ->leftJoin('categories', 'pre_surveys.business_type_id', '=', 'categories.id')
            ->leftJoin('sub_categories', 'pre_surveys.sub_category_id', '=', 'sub_categories.id')
            ->leftJoin('location_codes as block_location', 'pre_surveys.block_id', '=', 'block_location.id')
            ->leftJoin('location_codes as sector_location', 'pre_surveys.sector_id', '=', 'sector_location.id')
            ->leftJoin('location_codes as street_location', 'pre_surveys.street_id', '=', 'street_location.id')
            ->leftJoin('location_codes as side_of_street', 'pre_surveys.side_of_street_id', '=', 'side_of_street.id')
            ->select(
                'pre_surveys.*',
                'users.name as user_name',
                'branches.name_en as branch_name_en',
                'branches.name_kh as branch_name_kh',
                'categories.name as business_type_name',
                'sub_categories.name as sub_category_name',
                'block_location.type as block_type',
                'block_location.name as block_name',
                'sector_location.type as sector_type',
                'sector_location.name as sector_name',
                'street_location.type as street_type',
                'street_location.name as street_name',
                'side_of_street.type as side_of_street_type',
                'side_of_street.name as side_of_street_name',
            );
            // Apply branch filtering
            $query->where('pre_surveys.branch_id', $branchId);
            // Apply additional filtering for 'Staff' role
            if (Auth::user()->RolePermission == 'Staff') {
                $query->where('pre_surveys.user_id', Auth::user()->id);
            }
            // Fetch paginated data
            $data = $query->orderBy('pre_surveys.id', 'DESC')->paginate($per_page);
            $response = [
                'success' => true,
                'message' => 'Get Date Pre Survey successfully.',
                'data' => $data
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date Pre Survey Not found',
                'status'  => 201
            ];
            return response()->json($response, 201);
        }
    }

    public function preSurveyMap(Request $request){
        try{
            $branchId = Auth::user()->branch_default;
            $query = PreSurvey::leftJoin('users', 'pre_surveys.user_id', '=', 'users.id')
            ->leftJoin('categories', 'pre_surveys.business_type_id', '=', 'categories.id')
            ->leftJoin('sub_categories', 'pre_surveys.sub_category_id', '=', 'sub_categories.id')
            ->select(
                'pre_surveys.id',
                'pre_surveys.user_id',
                'pre_surveys.user_id',
                'pre_surveys.branch_id',
                'pre_surveys.location_longitude',
                'pre_surveys.location_latitude',
                'pre_surveys.link_map',
                'users.name as user_name',
                'categories.name as category_name',
                'sub_categories.name as sub_category_name'
            );
            // Apply branch filtering
            $query->where('pre_surveys.branch_id', $branchId);
            // Apply additional filtering for 'Staff' role
            if (Auth::user()->RolePermission == 'Staff') {
                $query->where('pre_surveys.user_id', Auth::user()->id);
            }
            // Fetch paginated data
            $data = $query->orderBy('pre_surveys.id', 'DESC')->get();
            $response = [
                'success' => true,
                'message' => 'Get Date Pre Survey Map successfully.',
                'data' => $data
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date Pre Survey Map Not found',
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
    public function store(PerSurveyRequest $request)
    {
        try{
            $data = $request->all();
            $data['branch_id']  = $request->branch_id;
            $data['user_id']  = Auth::user()->id;
            $data['created_by']  = Auth::user()->id;
            $PreSurvey = PreSurvey::create($data);
            //pre survey file
            foreach ($request->pre_survey_file as $item) {
                if(Helper::http_image($item['path_name'])){
                    $fileName = $item['path_name'];
                }else if(Helper::is_base64($item['path_name'])){
                    $path = Helper::get_pre_survey_file_path();
                    $full_path = Helper::upload_survey_base64($item['path_name'],$path);
                }
                $dataSurveyFile['pre_survey_id']  = $PreSurvey->id;
                $dataSurveyFile['full_path']     = $full_path[0];
                $dataSurveyFile['name']          = $full_path[1];
                $dataSurveyFile['created_by']    = Auth::user()->id;
                PreSurveyFile::create($dataSurveyFile);
            }
            $response = [
                'success' => true,
                'message' => 'Create Pre Survey Successfull',
                'status'  => 200
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            Log::info('=========== Error Insert ===============: ', $e->getMessage());
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PreSurvey  $preSurvey
     * @return \Illuminate\Http\Response
     */
    public function show(PreSurvey $preSurvey)
    {
        try{
            $response = [
                'success' => true,
                'message' => 'Get data Pre Survey successfully.',
                'data' => $preSurvey
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date Pre Survey not found',
                'status'  => 201
            ];
            return response()->json($response, 201);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PreSurvey  $preSurvey
     * @return \Illuminate\Http\Response
     */
    public function edit(PreSurvey $preSurvey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PreSurvey  $preSurvey
     * @return \Illuminate\Http\Response
     */
    public function update(PerSurveyRequest $request, PreSurvey $preSurvey)
    {
        try{
            $PreSurvey = PreSurvey::where('id',$request->id)->update([
                'user_id'    => $request->user_id,
                'branch_id'    => $request->branch_id,
                'block_id'    => $request->block_id,
                'sector_id'    => $request->sector_id,
                'street_id'    => $request->street_id,
                'side_of_street_id'    => $request->side_of_street_id,
                'business_type_id'    => $request->business_type_id,
                'sub_category_id'    => $request->sub_category_id,
                'location_longitude'    => $request->location_longitude,
                'location_latitude'    => $request->location_latitude,
                'link_map'    => $request->link_map,
                'updated_by'    => Auth::user()->id,
            ]);
            //pre survey file
            PreSurveyFile::where('pre_survey_id',$request->id)->delete();
            foreach ($request->pre_survey_file as $item) {
                if(Helper::http_image($item['path_name'])){
                    $fileName = $item['path_name'];
                }else if(Helper::is_base64($item['path_name'])){
                    $path = Helper::get_pre_survey_file_path();
                    $full_path = Helper::upload_survey_base64($item['path_name'],$path);
                }
                $PreSurveyFile['pre_survey_id']  = $item['pre_survey_id'];
                $PreSurveyFile['full_path']     = $full_path[0];
                $PreSurveyFile['name']          = $full_path[1];
                $PreSurveyFile['updated_by']    = Auth::user()->id;
                PreSurveyFile::create($PreSurveyFile);
            }
            $response = [
                'success' => true,
                'message' => 'Updated Pre Survey Successfull',
                'status'  => 200
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            Log::info('============== Error Update ===============: ', $e->getMessage());
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PreSurvey  $preSurveya
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            // Find the PreSurvey record by ID
            $preSurvey = PreSurvey::findOrFail($id);
            $preSurvey->update([
                'delete_by' => Auth::user()->id
            ]);
            $preSurvey->PreSurveyFile()->Delete();
            $preSurvey->Delete();
            $response = [
                'success' => true,
                'message' => 'Delete Pre Survey Successfull',
                'data' =>  null
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete Pre Survey',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
