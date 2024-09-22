<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Helpers\Helper;
use App\Models\Currency;
use App\Models\Customer;
use App\Traits\Generate;
use App\Models\StaffList;
use App\Models\PaymentType;
use App\Models\SubCategory;
use App\Models\BusinessType;
use App\Models\CustomerFile;
use App\Models\LocationCode;
use App\Models\SurveyDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerOfBusinessType;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    use Generate;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        RolePermission($this, 'Customer');
    }
    public function index()
    {
        $branchId = Session::get('branch_id');
        if (Auth::user()->RolePermission =='Staff') {
            $data = Customer::where('branch_id',$branchId)->get();
        } else {
            $data = Customer::all();
        }
        return view('customers.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $paymentType = PaymentType::all();
        $currency = Currency::all();
        $collector = StaffList::all();
        return view('customers.create',compact(
            'province',
            'block',
            'sector',
            'street',
            'SiteofStreet',
            'HouseOrder',
            'DevideOrder',
            'floor',
            'position',
            'dataBusinessType',
            'paymentType',
            'currency',
            'collector',
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
            $data = $request->all();
            $data['branch_id'] = Session::get('branch_id');
            $data['customer_no'] = $this->GenerateCustomerNo();
            $data['created_by'] =  Auth::user()->id;
            $data['status'] =  '1';
            $data['collection_date'] =  Carbon::createFromDate($request->exchange_date)->format('Y-m-d');
            $cust = Customer::create($data);
            if ($request->businessType) {
                foreach ($request->businessType as $item) {
                    $CustBusinessType['customer_id']       = $cust->id;
                    $CustBusinessType['business_type_id']  = $item['business_type_id'];
                    $CustBusinessType['category_id']       = $item['category_id'];
                    $CustBusinessType['sub_category_id']   = $item['sub_category_id'];
                    $CustBusinessType['multiply']          = $item['multiply'];
                    $CustBusinessType['land_filed_fee']    = $item['land_filed_fee'];
                    $CustBusinessType['monthly_fee']       = $item['monthly_fee'];
                    $CustBusinessType['grand_total']       = $item['grand_total'];
                    $CustBusinessType['created_by']        = Auth::user()->id;
                    CustomerOfBusinessType::create($CustBusinessType);
                }
            }
           
            if ($request->arrImage) {
                foreach ($request->arrImage as $item) {
                    if(Helper::http_image($item['path_name'])){
                        $fileName = $item['path_name'];
                    }else if(Helper::is_base64($item['path_name'])){
                        $path = Helper::get_customer_file_path();
                        $full_path = Helper::upload_customer_base64($item['path_name'],$path);
                    }
                    $attachments['customer_id']   = $cust->id;
                    $attachments['full_path']     = $full_path[0];
                    $attachments['name']          = $full_path[1];
                    $attachments['created_by']    = Auth::user()->id;
                    CustomerFile::create($attachments);
                }
            }
            
            $surveyDetail = SurveyDetail::where('location_code',$request->location_code)->first();
            Survey::where('id',$surveyDetail->survey_id)->update([
                'customer_id'   => $cust->id
            ]);
            DB::commit();
            return ['message' => 'successfull'];
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create Currency fail','Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $company = Customer::find($id);
            $company->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function searchLocationcode(Request $request){
        try{
            // $dataSurvey = SurveyDetail::with('survey')->where('location_code',$request->location_code)->first();
            $dataSurvey = Survey::leftJoin('staff_lists', 'surveys.staff_id', '=', 'staff_lists.id')
            ->leftJoin('survey_details','surveys.id','=','survey_details.survey_id')
            ->select(
                'surveys.*',
                'staff_lists.id',
                'staff_lists.name as survey_by',
                'survey_details.location_code',
                'survey_details.survey_name',
                'survey_details.business_name',
            )->where('survey_details.location_code',$request->location_code)->first();

            $data = [
                'dataSurvey'=> $dataSurvey,
                'survey_detail'=>SurveyDetail::where('location_code',$request->location_code)->with('survey_business_type')->with('survey_image_location')->get()
            ];
            // $SurveyDetail = SurveyDetail::with('survey_image_location')->where('survey_id',$dataSurvey->id)->first();
            return response()->json(['data'=> $data]);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function OnchangeCagegory(Request $request){
        try{
            $dataCategory = SubCategory::where('category_id',$request->cagegory_id)->get();
            return response()->json([
                'data'=>$dataCategory,
            ]);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function changeSubCagegory(Request $request){
        try{
            $dataSubCategory = SubCategory::find($request->sub_cagegory_id);
            return response()->json([
                'data'=>$dataSubCategory,
            ]);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function customerDetail($id){
        $data = Customer::with(['customersHavBusiness','customerImage','staff'])->where('id',$id)->first();
        return view('customers.detail',compact('data'));
    }
}
