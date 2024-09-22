<?php

namespace App\Http\Controllers\Api;

use App\Models\Survey;
use App\Helpers\Helper;
use App\Traits\Generate;
use App\Models\SurveyFile;
use App\Models\SurveyDetail;
use Illuminate\Http\Request;
use App\Models\SurveyBusinessType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SurveyController extends Controller
{
    use Generate;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $branchId = Auth::user()->branch_default;
            $block = null;
            $sector = null;
            $street_no = null;
            $side_of_street = null;
            if ($request->block) {
                $block = $request->block;
            }
            if ($request->sector) {
                $sector = $request->sector;
            }
            if ($request->street_no) {
                $street_no = $request->street_no;
            }
            if ($request->side_of_street) {
                $side_of_street = $request->side_of_street;
            }
            if (Auth::user()->RolePermission =='Staff') {
                $data = DB::table('surveys')
                ->leftJoin('branches','surveys.branch_id','=','branches.id')
                ->leftJoin('users','surveys.created_by','=','users.id')
                ->leftJoin('staff_lists','surveys.staff_id','=','staff_lists.id')
                ->leftJoin('customers','surveys.customer_id','=','customers.id')
                ->leftJoin('tb_province','surveys.province','=', DB::raw("CONVERT(tb_province.code USING utf8)"))
                ->leftJoin('tb_district','surveys.district','=', DB::raw("CONVERT(tb_district.code USING utf8)"))
                ->leftJoin('tb_commune','surveys.commune','=', DB::raw("CONVERT(tb_commune.code USING utf8)"))
                ->leftJoin('tb_village','surveys.village','=', DB::raw("CONVERT(tb_village.code USING utf8)"))
                ->select(
                    'surveys.*',
                    'branches.name_kh as bran_name_kh',
                    'branches.name_en as bran_name_en',
                    'customers.customer_name',
                    'users.name as user_name',
                    'users.name as created_by_name',
                    'staff_lists.name as survey_by',
                    'tb_province.khmer as province_name_khmer',
                    'tb_province.english as province_name_english',
                    'tb_district.khmer as district_name_khmer',
                    'tb_district.english as district_name_english',
                    'tb_commune.khmer as commune_name_khmer',
                    'tb_commune.english as commune_name_english',
                    'tb_village.khmer as village_name_khmer',
                    'tb_village.english as village_name_english',
                )->when($block, function ($query, $block) {
                    $query->where('surveys.block', 'LIKE', '%'.$block.'%');
                })->when($sector, function ($query, $sector) {
                    $query->where('surveys.sector', 'LIKE', '%'.$sector.'%');
                })->when($street_no, function ($query, $street_no) {
                    $query->where('surveys.street_no', 'LIKE', '%'.$street_no.'%');
                })->when($side_of_street, function ($query, $side_of_street) {
                    $query->where('surveys.side_of_street', 'LIKE', '%'.$side_of_street.'%');
                })->orderBy('id','DESC')->where('surveys.branch_id',$branchId)->where('surveys.user_id',Auth::user()->id)->get();
            } else {
                $data = DB::table('surveys')
                ->leftJoin('branches','surveys.branch_id','=','branches.id')
                ->leftJoin('users','surveys.created_by','=','users.id')
                ->leftJoin('staff_lists','surveys.staff_id','=','staff_lists.id')
                ->leftJoin('customers','surveys.customer_id','=','customers.id')
                ->leftJoin('tb_province','surveys.province','=', DB::raw("CONVERT(tb_province.code USING utf8)"))
                ->leftJoin('tb_district','surveys.district','=', DB::raw("CONVERT(tb_district.code USING utf8)"))
                ->leftJoin('tb_commune','surveys.commune','=', DB::raw("CONVERT(tb_commune.code USING utf8)"))
                ->leftJoin('tb_village','surveys.village','=', DB::raw("CONVERT(tb_village.code USING utf8)"))
                ->select(
                    'surveys.*',
                    'branches.name_kh as bran_name_kh',
                    'branches.name_en as bran_name_en',
                    'customers.customer_name',
                    'users.name as user_name',
                    'users.name as created_by_name',
                    'staff_lists.name as survey_by',
                    'tb_province.khmer as province_name_khmer',
                    'tb_province.english as province_name_english',
                    'tb_district.khmer as district_name_khmer',
                    'tb_district.english as district_name_english',
                    'tb_commune.khmer as commune_name_khmer',
                    'tb_commune.english as commune_name_english',
                    'tb_village.khmer as village_name_khmer',
                    'tb_village.english as village_name_english',
                )->when($block, function ($query, $block) {
                    $query->where('surveys.block', 'LIKE', '%'.$block.'%');
                })->when($sector, function ($query, $sector) {
                    $query->where('surveys.sector', 'LIKE', '%'.$sector.'%');
                })->when($street_no, function ($query, $street_no) {
                    $query->where('surveys.street_no', 'LIKE', '%'.$street_no.'%');
                })->when($side_of_street, function ($query, $side_of_street) {
                    $query->where('surveys.side_of_street', 'LIKE', '%'.$side_of_street.'%');
                })->orderBy('id','DESC')->where('surveys.branch_id',$branchId)->get();
            }
            $response = [
                'success' => true,
                'message' => 'Get Date Survey successfully.',
                'data' => $data
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date Survey Not found',
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
        try{
            $data = $request->all();
            $data['branch_id']  = $request->branch_id;
            $data['role_id']  = $request->role_id;
            $data['trans_no']  = $this->GenerateTrainNo();
            $data['created_by']  = Auth::user()->id;
            $survey = Survey::create($data);

            //Survey Detail
            foreach ($request->surveyDetail as $value) {
                $dataSurveyDetail['survey_id']= $survey->id;
                $dataSurveyDetail['location_code']= $value['location_code'];
                $dataSurveyDetail['location_longitude']= $value['location_longitude'];
                $dataSurveyDetail['location_latitude']= $value['location_latitude'];
                $dataSurveyDetail['order_of_house']= $value['order_of_house'];
                $dataSurveyDetail['devide_order']= $value['devide_order'];
                $dataSurveyDetail['floor']= $value['floor'];
                $dataSurveyDetail['position']= $value['position'];
                $dataSurveyDetail['survey_name']= $value['survey_name'];
                $dataSurveyDetail['business_name']= $value['survey_name'];
                $dataSurveyDetail['business_type_id']= $value['business_type_id'];
                $dataSurveyDetail['category_id']= $value['category_id'];
                $dataSurveyDetail['sub_category_id']= $value['sub_category_id'];
                $dataSurveyDetail['total_amount']= $value['total_amount'];
                $dataSurveyDetail['created_by']= Auth::user()->id;
                $survey_detail = SurveyDetail::create($dataSurveyDetail);

                //survey of business type
                foreach ($value['surveyBusinessTypes'] as $item) {
                    $surveyBusinessType['survey_detail_id']= $survey_detail->id;
                    $surveyBusinessType['business_type_id']= $item['business_type_id'];
                    $surveyBusinessType['category_id']= $item['category_id'];
                    $surveyBusinessType['sub_category_id']= $item['sub_category_id'];
                    $surveyBusinessType['multiply']          = $item['multiply'];
                    $surveyBusinessType['land_filed_fee']    = $item['land_filed_fee'];
                    $surveyBusinessType['monthly_fee']        = $item['monthly_fee'];
                    $surveyBusinessType['grand_total']       = ($item['monthly_fee'] + $item['land_filed_fee']) * $item['multiply'];
                    $surveyBusinessType['created_by']= Auth::user()->id;
                    SurveyBusinessType::create($surveyBusinessType);
                }
                //survey file
                SurveyFile::where('survey_detail_id',$survey_detail->id)->delete();
                foreach ($value['SurveyFile'] as $item) {
                    if(Helper::http_image($item['path_name'])){
                        $fileName = $item['path_name'];
                    }else if(Helper::is_base64($item['path_name'])){
                        $path = Helper::get_survey_file_path();
                        $full_path = Helper::upload_survey_base64($item['path_name'],$path);
                    }
                    $dataSurveyFile['survey_detail_id']  = $survey_detail->id;
                    $dataSurveyFile['path_name']     = $full_path[0];
                    $dataSurveyFile['name']          = $full_path[1];
                    $dataSurveyFile['created_by']    = Auth::user()->id;
                    SurveyFile::create($dataSurveyFile);
                }
            }
            $response = [
                'success' => true,
                'message' => 'Create Survey Successfull',
                'status'  => 200
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        try{
            $response = [
                'success' => true,
                'message' => 'Data Survey Successfull',
                'data' => $survey
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        try{
            return response()->json($survey);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        //
    }

    public function surveyDetail(Request $request){
        try{
            $data = SurveyDetail::leftJoin('users','survey_details.created_by','=','users.id')
            ->select(
                'survey_details.*',
                'users.name as created_by_name'
            )->where('survey_id',$request->id)->get();
            $response = [
                'success' => true,
                'message' => 'Get Data Survey detail Successfull',
                'data' => $data
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function surveyBusinessType(Request $request){
        try{
            $data = DB::table('survey_business_types')
            ->leftJoin('business_types','survey_business_types.business_type_id','=','business_types.id')
            ->leftJoin('categories','survey_business_types.category_id','=','categories.id')
            ->leftJoin('sub_categories','survey_business_types.sub_category_id','=','sub_categories.id')
            ->leftJoin('users','survey_business_types.created_by','=','users.id')
            ->select(
                'survey_business_types.*',
                'business_types.name as business_type_name',
                'categories.name as categorie_name',
                'sub_categories.name as sub_categorie_name',
                'users.name as created_by_name'
            )->where('survey_detail_id',$request->id)->get();
            $response = [
                'success' => true,
                'message' => 'Get Data Survey business type Successfull',
                'data' => $data
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function surveyUploadLocation(Request $request){
        try{
            SurveyDetail::where('id',$request->id)->update([
                'location_longitude'  => $request->location_longitude,
                'location_latitude'  => $request->location_latitude,
                'updated_by'  => Auth::user()->id,
            ]);
            SurveyFile::where('survey_detail_id',$request->id)->delete();
            foreach ($request->SurveyFile as $item) {
                if(Helper::http_image($item['path_name'])){
                    $fileName = $item['path_name'];
                }else if(Helper::is_base64($item['path_name'])){
                    $path = Helper::get_survey_file_path();
                    $full_path = Helper::upload_survey_base64($item['path_name'],$path);
                }
                $dataSurveyFile['survey_detail_id']  = $item['survey_detail_id'];
                $dataSurveyFile['path_name']     = $full_path[0];
                $dataSurveyFile['name']          = $full_path[1];
                $dataSurveyFile['created_by']    = Auth::user()->id;
                SurveyFile::create($dataSurveyFile);
            }
            $response = [
                'success' => true,
                'message' => 'Updated Location Code Successfull'
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function getImageLocation(Request $request){
        try{
            $data = SurveyFile::leftJoin('survey_details','survey_files.survey_detail_id','=','survey_details.id')
            ->select(
                'survey_files.*',
                'survey_details.location_code',
                'survey_details.survey_name',
            )->where('survey_files.survey_detail_id',$request->survey_detail_id)->get();
            $response = [
                'success' => true,
                'message' => 'Get date survey image location successfully.',
                'data' => $data
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function numberOfSurvey(){
        try{
            $totalSurvey = DB::table('surveys')->orderBy('id','DESC')->count();
            $totalAmount = DB::table('surveys')->whereNotNull('customer_id')->sum('total_amount');
            $response = [
                'success' => true,
                'message' => 'Get number of survey successfully.',
                'total_survey' => $totalSurvey,
                'total_amount' => $totalAmount,
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get number of survey Not found',
                'status'  => 201
            ];
            return response()->json($response, 201);
        }
    }
}
