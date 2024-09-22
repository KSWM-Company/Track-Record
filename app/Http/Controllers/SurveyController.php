<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Helpers\Helper;
use App\Models\Category;
use App\Traits\Generate;
use App\Models\StaffList;
use App\Models\SurveyFile;
use App\Models\SubCategory;
use App\Models\BusinessType;
use App\Models\LocationCode;
use App\Models\SurveyDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SurveyBusinessType;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SurveyController extends Controller
{
    use Generate;
    function __construct()
    {
        RolePermission($this, 'Survey');
    }

    public function index()
    {
        $branchId = Session::get('branch_id');
        if (Auth::user()->RolePermission =='Staff') {
            $data = Survey::with('surveyDetail')->where('user_id',Auth::user()->id)->where('branch_id',$branchId)->get();
        } else {
            $data = Survey::with('surveyDetail')->get();
        }
        return view('surveys.index',compact('data'));
    }
    public function create(){
        $block = LocationCode::where('type','Block')->get();
        $sector = LocationCode::where('type','Sector')->get();
        $street = LocationCode::where('type','Street')->get();
        $SiteofStreet = LocationCode::where('type','Site_of_Street')->get();
        $HouseOrder = LocationCode::where('type','House_Order')->get();
        $DevideOrder = LocationCode::where('type','Devide_Order')->get();
        $floor = LocationCode::where('type','Floor')->get();
        $position = LocationCode::where('type','Position')->get();
        $province = DB::table('tb_province')->get();
        $dataBusinessType = BusinessType::all();
        $category = Category::all();
        $SubCategory = SubCategory::all();
        $staff = StaffList::all();
        return view('surveys.create',compact(
            'block',
            'sector',
            'street',
            'SiteofStreet',
            'HouseOrder',
            'DevideOrder',
            'floor',
            'position',
            'province',
            'dataBusinessType',
            'category',
            'SubCategory',
            'staff'
        ));
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
            $autoTrainNo   = $this->GenerateTrainNo();
            $survey_date = Carbon::createFromDate($request->survey_date)->format('Y-m-d');
            $entry_date = Carbon::createFromDate($request->entry_date)->format('Y-m-d');

            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['branch_id'] = Session::get('branch_id');
            $data['trans_no'] = $autoTrainNo;
            $data['staff_id'] = $request->survey_by;
            $data['survey_date'] = $survey_date;
            $data['entry_date'] = $entry_date;

            $data['block'] = $request->block;
            $data['sector'] = $request->sector;
            $data['street_no'] = $request->street_no;
            $data['side_of_street'] = $request->side_of_street;
            $data['zone_name'] = $request->zone_name;
            $data['start_piont'] = $request->start_piont;
            $data['end_piont'] = $request->end_piont;
            $data['add_street'] = $request->add_street;
            $data['province'] = $request->province;
            $data['district'] = $request->district;
            $data['commune'] = $request->commune;
            $data['village'] = $request->village;
            $data['total_amount'] = $request->total_amount;

            $data['created_by'] =  Auth::user()->id;
            $survey = Survey::create($data);

            foreach($data['surveyDetail'] as $item){
                $dataSurveyDetail = SurveyDetail::create([
                    'survey_id' => $survey->id,
                    'location_code' => $item['location_code'],
                    'location_latitude' => $item['location_latitude'],
                    'location_longitude' => $item['location_longitude'],
                    'link_map' => $item['link_map'],
                    'order_of_house' => $item['order_of_house'],
                    'devide_order' => $item['devide_order'],
                    'floor' => $item['floor'],
                    'position' => $item['position'],
                    'house_no' => $item['house_no'],
                    'survey_name' => $item['survey_name'],
                    'business_name' => $item['business_name'],
                    'total_amount' => $item['total_amount'],
                    'created_by' => Auth::user()->id
                ]);
                // insert BusinessType
                foreach ($item['businessType'] as $key => $valueBusinessType) {
                    SurveyBusinessType::create([
                    'survey_detail_id' => $dataSurveyDetail->id,
                    'business_type_id' => $valueBusinessType['business_type_id'],
                    'category_id' => $valueBusinessType['category_id'],
                    'sub_category_id' => $valueBusinessType['sub_category_id'],
                    'multiply' => $valueBusinessType['multiply'],
                    'land_filed_fee' => $valueBusinessType['land_filed_fee'],
                    'monthly_fee' => $valueBusinessType['monthly_fee'],
                    'grand_total' => $valueBusinessType['grand_total'],
                    'created_by' => Auth::user()->id
                   ]);
                }
                // insert image_location
                foreach ($item['image_location'] as $key => $valueImage_location) {
                    // convert base64
                    // $image = Helper::upload_survey_base64($valueImage_location, "survey/files/");
                    if(Helper::http_image($valueImage_location)){
                        $fileName = $valueImage_location;
                    }else if(Helper::is_base64($valueImage_location)){
                        $path = Helper::get_survey_file_path();
                        $full_path = Helper::upload_survey_base64($valueImage_location,$path);
                    }
                    SurveyFile::create([
                        'survey_detail_id' => $dataSurveyDetail->id,
                        'path_name' => $full_path[0],
                        'name' => $full_path[1],
                        'created_by' => Auth::user()->id
                    ]);
                }
            }
            DB::commit();
            return ['status'=> true, 'message' => 'successfull'];
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create Survey fail', $e->getMessage());
            return ['status'=> true, 'message' => $e->getMessage()];
        }
    }
    function check_dulicate_location($location){
        $dataSurveyDetail = SurveyDetail::where('location_code', $location)->first();
        if($dataSurveyDetail == null){
            return 0;
        }
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'survey'=> Survey::where('id',$id)->with('staff')->with('provinces')->with('districts')->with('communes')->with('villages')->first(),
            'survey_detail'=>SurveyDetail::where('survey_id', $id)->with('survey_business_type')->with('survey_image_location')->get()
        ];
        return view('surveys.detail', compact('data'));
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

    public function OnchangeCagegory(Request $request){
        $dataCategory = SubCategory::where('category_id',$request->cagegory_id)->get();
        return response()->json([
            'data'=>$dataCategory,
        ]);
    }
    public function OnchangeSubCagegory(Request $request){
        $dataSubCategory = SubCategory::find($request->sub_cagegory_id);
        return response()->json([
            'data'=>$dataSubCategory,
        ]);
    }
}
