<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\StaffList;
use App\Models\PaymentType;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Models\ChangRequestCustomer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Models\ChangRquestCustomerFile;
use App\Models\ChangRquestCustomerBusinessType;

class CustomerChangRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        RolePermission($this, 'Chang Request Customers');
    }
    public function index()
    {
        $dataRequest = DB::table('chang_request_customers')
        ->leftJoin('branches','chang_request_customers.branch_id','=','branches.id')
        ->leftJoin('staff_lists','chang_request_customers.request_by','=','staff_lists.id')
        ->leftJoin('currencies','chang_request_customers.currency','=','currencies.id')
        ->select(
            'chang_request_customers.*',
            'branches.name_kh',
            'branches.name_en',
            'staff_lists.name as request_by',
            'currencies.name as currency',
        )->where('status','Request')->get();
        // dd($dataRequest);
        $data = DB::table('chang_request_customers')
        ->leftJoin('branches','chang_request_customers.branch_id','=','branches.id')
        ->leftJoin('users','chang_request_customers.approved_by','=','users.id')
        ->select(
            'chang_request_customers.*',
            'branches.name_kh',
            'branches.name_en',
            'users.name as approved_by',
        )->where('status','Approve')->get();
        return view('customer_request.index',compact('dataRequest','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $province = DB::table('tb_province')->get();
        $paymentType = PaymentType::all();
        $currency = Currency::all();
        $dataBusinessType = BusinessType::all();
        $collector = StaffList::all();
        return view('customer_request.create',compact('province','paymentType','currency','dataBusinessType','collector'));
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
            $data['created_by'] =  Auth::user()->id;
            $data['status'] =  'Request';
            $data['collection_date'] =  Carbon::createFromDate($request->exchange_date)->format('Y-m-d');
            $cust = ChangRequestCustomer::create($data);
            if ($request->itemBusineeType) {
                foreach ($request->itemBusineeType as $item) {
                    $CustBusinessType['chang_request_customer_id'] = $cust->id;
                    $CustBusinessType['business_type_id']  = $item['business_type_id'];
                    $CustBusinessType['category_id']       = $item['category_id'];
                    $CustBusinessType['sub_category_id']   = $item['sub_category_id'];
                    $CustBusinessType['multiply']          = $item['multiply'];
                    $CustBusinessType['land_filed_fee']    = $item['land_filed_fee'];
                    $CustBusinessType['monthly_fee']       = $item['monthly_fee'];
                    $CustBusinessType['grand_total']       = $item['grand_total'];
                    $CustBusinessType['created_by']        = Auth::user()->id;
                    ChangRquestCustomerBusinessType::create($CustBusinessType);
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
                    $attachments['chang_request_customer_id']   = $cust->id;
                    $attachments['full_path']     = $full_path[0];
                    $attachments['name']          = $full_path[1];
                    $attachments['created_by']    = Auth::user()->id;
                    ChangRquestCustomerFile::create($attachments);
                }
            }
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
        //
    }

    public function customerAutocomplete(Request $request) : JsonResponse{
        try{
            $search = $request->customer_no;
            $data = DB::table("customers")->select("id","customer_no")->where('customer_no','LIKE',"%$search%")->pluck('customer_no');
            return response()->json($data);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function customerChangRequestFilter(Request $request){
        try{
            //function get customer
            $data = DB::table('customers')
            ->leftJoin('tb_province','customers.province','=', DB::raw("CONVERT(tb_province.code USING utf8)"))
            ->leftJoin('tb_district','customers.district','=', DB::raw("CONVERT(tb_district.code USING utf8)"))
            ->leftJoin('tb_commune','customers.commune','=', DB::raw("CONVERT(tb_commune.code USING utf8)"))
            ->leftJoin('tb_village','customers.village','=', DB::raw("CONVERT(tb_village.code USING utf8)"))
            ->leftJoin('currencies','customers.currency','=', 'currencies.id')
            ->leftJoin('payment_types','customers.payment_type','=', 'payment_types.id')
            ->leftJoin('staff_lists','customers.collector','=', 'staff_lists.id')
            ->select(
                'customers.*',
                'tb_province.khmer as province_name_khmer',
                'tb_province.english as province_name_english',
                'tb_district.khmer as district_name_khmer',
                'tb_district.english as district_name_english',
                'tb_commune.khmer as commune_name_khmer',
                'tb_commune.english as commune_name_english',
                'tb_village.khmer as village_name_khmer',
                'tb_village.english as village_name_english',
                'currencies.name as currencies_name',
                'payment_types.name as payment_types',
                'staff_lists.name as collector_name',
            )->where('customer_no',$request->search)->first();

            //function get customer business type by customer
            $dataCustomerBusinessType = DB::table('customer_of_business_types')
            ->leftJoin('business_types','customer_of_business_types.business_type_id','=','business_types.id')
            ->leftJoin('categories','customer_of_business_types.category_id','=','categories.id')
            ->leftJoin('sub_categories','customer_of_business_types.sub_category_id','=','sub_categories.id')
            ->leftJoin('users','customer_of_business_types.created_by','=','users.id')
            ->select(
                'customer_of_business_types.*',
                'business_types.name as business_type',
                'categories.name as categorie',
                'sub_categories.name as sub_categorie',
            )->where('customer_id',$data->id)->get();
            $customerFile = DB::table('customer_files')->where('customer_id',$data->id)->get();
            $businessTypes = DB::table("business_types")->get();
            $categories = DB::table("categories")->get();
            $sub_categories = DB::table("sub_categories")->get();
            return response()->json([
                'data'=>$data,
                'dataCustomerBusinessType'=>$dataCustomerBusinessType,
                'customerFile'=>$customerFile,
                'businessTypes'=>$businessTypes,
                'categories'=>$categories,
                'sub_categories'=>$sub_categories,
            ]);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function approve(Request $request){
        try{
            if ($request->status == 'Approve') {
                ChangRequestCustomer::where('id',$request->id)->update([
                    'status' => $request->status,
                    'approved_by' => Auth::user()->id,
                    'approved_date' => $request->approve_date,
                    'reson' => $request->reason
                ]);
            }elseif($request->status == 'Reject'){
                ChangRequestCustomer::where('id',$request->id)->update([
                    'status' => $request->status,
                    'reject_date' => $request->reject_date,
                    'reson' => $request->reason
                ]);
            }

            DB::commit();
            return ['message' => 'successfull'];
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create Currency fail','Error');
            return redirect()->back();
        }
    }

    public function changeRequestDetail(Request $request){
        $data = DB::table('chang_request_customers')
        ->leftJoin('branches','chang_request_customers.branch_id','=','branches.id')
        ->leftJoin('tb_province','chang_request_customers.province','=', DB::raw("CONVERT(tb_province.code USING utf8)"))
        ->leftJoin('tb_district','chang_request_customers.district','=', DB::raw("CONVERT(tb_district.code USING utf8)"))
        ->leftJoin('tb_commune','chang_request_customers.commune','=', DB::raw("CONVERT(tb_commune.code USING utf8)"))
        ->leftJoin('tb_village','chang_request_customers.village','=', DB::raw("CONVERT(tb_village.code USING utf8)"))
        ->select(
            'chang_request_customers.*',
            'branches.name_en',
            'branches.name_kh',
            'tb_province.khmer as province_name_khmer',
            'tb_province.english as province_name_english',
            'tb_district.khmer as district_name_khmer',
            'tb_district.english as district_name_english',
            'tb_commune.khmer as commune_name_khmer',
            'tb_commune.english as commune_name_english',
            'tb_village.khmer as village_name_khmer',
            'tb_village.english as village_name_english',
        )->where('chang_request_customers.id',$request->id)->first();
        $dataBusinessType = DB::table('chang_rquest_customer_business_types')
        ->leftJoin('business_types','chang_rquest_customer_business_types.business_type_id','=','business_types.id')
        ->leftJoin('categories','chang_rquest_customer_business_types.category_id','=','categories.id')
        ->leftJoin('sub_categories','chang_rquest_customer_business_types.sub_category_id','=','sub_categories.id')
        ->select(
            'chang_rquest_customer_business_types.*',
            'business_types.name as business_type',
            'categories.name as categorie',
            'sub_categories.name as sub_categorie',
        )->where('chang_rquest_customer_business_types.chang_request_customer_id',$data->id)->get();
        return view('customer_request.detail',compact('data','dataBusinessType'));
    }
}
