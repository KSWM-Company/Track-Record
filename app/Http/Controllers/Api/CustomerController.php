<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Models\Customer;
use App\Traits\Generate;
use App\Models\CustomerFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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

    public function index(Request $request)
    {
        try{
            $branchId = Auth::user()->branch_default;
            $customer_no = null;
            $customer_name = null;
            if ($request->customer_no) {
                $customer_no = $request->customer_no;
            }
            if ($request->customer_name) {
                $customer_name = $request->customer_name;
            }
            if (Auth::user()->RolePermission =='Staff') {
                $data = DB::table('customers')
                ->leftJoin('branches','customers.branch_id','=','branches.id')
                ->leftJoin('users','customers.created_by','=','users.id')
                ->leftJoin('currencies','customers.currency','=','currencies.id')
                ->leftJoin('staff_lists','customers.collector','=','staff_lists.id')
                ->leftJoin('payment_types','customers.payment_type','=','payment_types.id')
                ->leftJoin('tb_province','customers.province','=', DB::raw("CONVERT(tb_province.code USING utf8)"))
                ->leftJoin('tb_district','customers.district','=', DB::raw("CONVERT(tb_district.code USING utf8)"))
                ->leftJoin('tb_commune','customers.commune','=', DB::raw("CONVERT(tb_commune.code USING utf8)"))
                ->leftJoin('tb_village','customers.village','=', DB::raw("CONVERT(tb_village.code USING utf8)"))
                ->select(
                    'customers.*',
                    'branches.name_kh as bran_name_kh',
                    'branches.name_en as bran_name_en',
                    'users.name as created_by_name',
                    'payment_types.name as payment_type_name',
                    'currencies.name as currencies_name',
                    'staff_lists.name as collector_name',
                    'tb_province.khmer as province_name_khmer',
                    'tb_province.english as province_name_english',
                    'tb_district.khmer as district_name_khmer',
                    'tb_district.english as district_name_english',
                    'tb_commune.khmer as commune_name_khmer',
                    'tb_commune.english as commune_name_english',
                    'tb_village.khmer as village_name_khmer',
                    'tb_village.english as village_name_english',
                )->when($customer_no, function ($query, $customer_no) {
                    $query->where('customers.customer_no', 'LIKE', '%'.$customer_no.'%');
                })->when($customer_name, function ($query, $customer_name) {
                    $query->where('customers.customer_name', 'LIKE', '%'.$customer_name.'%');
                })->orderBy('id','DESC')->where('customers.branch_id',$branchId)->where('customers.created_by',Auth::user()->id)->get();
            } else {
                $data = DB::table('customers')
                ->leftJoin('branches','customers.branch_id','=','branches.id')
                ->leftJoin('users','customers.created_by','=','users.id')
                ->leftJoin('currencies','customers.currency','=','currencies.id')
                ->leftJoin('staff_lists','customers.collector','=','staff_lists.id')
                ->leftJoin('payment_types','customers.payment_type','=','payment_types.id')
                ->leftJoin('tb_province','customers.province','=', DB::raw("CONVERT(tb_province.code USING utf8)"))
                ->leftJoin('tb_district','customers.district','=', DB::raw("CONVERT(tb_district.code USING utf8)"))
                ->leftJoin('tb_commune','customers.commune','=', DB::raw("CONVERT(tb_commune.code USING utf8)"))
                ->leftJoin('tb_village','customers.village','=', DB::raw("CONVERT(tb_village.code USING utf8)"))
                ->select(
                    'customers.*',
                    'branches.name_kh as bran_name_kh',
                    'branches.name_en as bran_name_en',
                    'users.name as created_by_name',
                    'payment_types.name as payment_type_name',
                    'currencies.name as currencies_name',
                    'staff_lists.name as collector_name',
                    'tb_province.khmer as province_name_khmer',
                    'tb_province.english as province_name_english',
                    'tb_district.khmer as district_name_khmer',
                    'tb_district.english as district_name_english',
                    'tb_commune.khmer as commune_name_khmer',
                    'tb_commune.english as commune_name_english',
                    'tb_village.khmer as village_name_khmer',
                    'tb_village.english as village_name_english',
                )->when($customer_no, function ($query, $customer_no) {
                    $query->where('customers.customer_no', 'LIKE', '%'.$customer_no.'%');
                })->when($customer_name, function ($query, $customer_name) {
                    $query->where('customers.customer_name', 'LIKE', '%'.$customer_name.'%');
                })->orderBy('id','DESC')->where('customers.branch_id',$branchId)->get();
            }

            
            $response = [
                'success' => true,
                'message' => 'Get date customer successfully.',
                'data' => $data
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
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
            $data['customer_no']  = $this->GenerateCustomerNo();
            $data['branch_id']  = $request->branch_id;
            $data['created_by']  = Auth::user()->id;
            $customer = Customer::create($data);
            foreach ($request->businessType as $item) {
                $CusBusinessType['customer_id']       = $customer->id;
                $CusBusinessType['business_type_id']  = $item['business_type_id'];
                $CusBusinessType['category_id']       = $item['category_id'];
                $CusBusinessType['sub_category_id']   = $item['sub_category_id'];
                $CusBusinessType['multiply']          = $item['multiply'];
                $CusBusinessType['land_filed_fee']    = $item['land_filed_fee'];
                $CusBusinessType['monthly_fee']        = $item['monthly_fee'];
                $CusBusinessType['grand_total']       = ($item['monthly_fee'] + $item['land_filed_fee']) * $item['multiply'];
                $CusBusinessType['created_by']        = Auth::user()->id;
                CustomerOfBusinessType::create($CusBusinessType);
            }
            CustomerFile::where('customer_id',$customer->id)->delete();
            foreach ($request->attachments as $item) {
                if(Helper::http_image($item['path_name'])){
                    $fileName = $item['path_name'];
                }else if(Helper::is_base64($item['path_name'])){
                    $path = Helper::get_customer_file_path();
                    $full_path = Helper::upload_customer_base64($item['path_name'],$path);
                }
                $attachments['customer_id']   = $customer->id;
                $attachments['full_path']     = $full_path[0];
                $attachments['name']          = $full_path[1];
                $attachments['created_by']    = Auth::user()->id;
                CustomerFile::create($attachments);
            }
            $response = [
                'success' => true,
                'message' => 'Create Customer successfully.',
                'status'  => '200'
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        try{
            $response = [
                'success' => true,
                'message' => 'Get data Customer successfully.',
                'data' => $customer
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date Customer not found',
                'status'  => '201'
            ];
            return response()->json($response, 201);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        try{
            return response()->json($customer);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        try{
            $customer = Customer::where('id',$request->id)->update([
                'branch_id'  => $request->branch_id,
                'customer_name'  => $request->customer_name,
                'business_name'  => $request->business_name,
                'email'  => $request->email,
                'location_longitude'  => $request->location_longitude,
                'location_latitude'  => $request->location_latitude,
                'zone_name'  => $request->zone_name,
                'houes_no'  => $request->houes_no,
                'add_streed'  => $request->add_streed,
                'vatin'  => $request->vatin,
                'contact_person'  => $request->contact_person,
                'sex'  => $request->sex,
                'phone_number'  => $request->phone_number,
                'title'  => $request->title,
                'fee'  => $request->fee,
                'vat'  => $request->vat,
                'vat_amount'  => $request->vat_amount,
                'total_fee'  => $request->total_fee,
                'currency'  => $request->currency,
                'payment_type'  => $request->payment_type,
                'collector'  => $request->collector,
                'collection_date'  => $request->collection_date,
                'updated_by'  => Auth::user()->id,
            ]);
            // dd($customer);
            foreach ($request->businessType as $item) {
                $CusBusinessType['customer_id']       = $item['customer_id'];
                $CusBusinessType['business_type_id']  = $item['business_type_id'];
                $CusBusinessType['category_id']       = $item['category_id'];
                $CusBusinessType['sub_category_id']   = $item['sub_category_id'];
                $CusBusinessType['multiply']          = $item['multiply'];
                $CusBusinessType['total_fee']         = $item['total_fee'];
                $CusBusinessType['grand_total']       = $item['total_fee'] * $item['multiply'];
                $CusBusinessType['updated_by']        = Auth::user()->id;
                CustomerOfBusinessType::where('id',$item['id'])->where('customer_id',$item['customer_id'])->update($CusBusinessType);
            }
            
            foreach ($request->attachments as $item) {
                if(Helper::http_image($item['path_name'])){
                    $fileName = $item['path_name'];
                }else if(Helper::is_base64($item['path_name'])){
                    $path = Helper::get_customer_file_path();
                    $full_path = Helper::upload_customer_base64($item['path_name'],$path);
                }
                $attachments['customer_id']   = $item['customer_id'];
                $attachments['full_path']     = $full_path[0];
                $attachments['name']          = $full_path[1];
                $attachments['updated_by']    = Auth::user()->id;
                CustomerFile::where('id',$item['id'])->where('customer_id',$item['customer_id'])->update($attachments);
            }

            $response = [
                'success' => true,
                'message' => 'Updated Customer successfully.',
                'data' => $customer
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        try{
            $response = [
                'success' => true,
                'message' => 'Delete Customer Successfull',
                'data' =>  $customer->delete()
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function customerDetail(Request $request){
        try{
            $data = CustomerOfBusinessType::leftJoin('business_types','customer_of_business_types.business_type_id','=','business_types.id')
                ->leftJoin('categories','customer_of_business_types.category_id','=','categories.id')
                ->leftJoin('sub_categories','customer_of_business_types.sub_category_id','=','sub_categories.id')
                ->leftJoin('users','customer_of_business_types.created_by','=','users.id')
                ->select(
                    'customer_of_business_types.*',
                    'business_types.name as business_type',
                    'categories.name as categorie',
                    'sub_categories.name as sub_categorie',
                    'users.name as created_by_name'
                )->where('customer_id',$request->id)->get();
                $response = [
                    'success' => true,
                    'message' => 'Data Customer detail Successfull',
                    'data' =>  $data
                ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function customerUploadLocation(Request $request){
        try{
            $data = Customer::where('id',$request->id)->update([
                'location_longitude'  => $request->location_longitude,
                'location_latitude'  => $request->location_latitude,
                'updated_by'  => Auth::user()->id,
            ]);
            CustomerFile::where('customer_id',$request->id)->delete();
            foreach ($request->attachments as $item) {
                if(Helper::http_image($item['path_name'])){
                    $fileName = $item['path_name'];
                }else if(Helper::is_base64($item['path_name'])){
                    $path = Helper::get_customer_file_path();
                    $full_path = Helper::upload_customer_base64($item['path_name'],$path);
                }
                $dataCustomerFile['customer_id'] = $item['customer_id'];
                $dataCustomerFile['full_path'] = $full_path[0];
                $dataCustomerFile['name'] = $full_path[1];
                $dataCustomerFile['updated_by'] = Auth::user()->id;
                CustomerFile::create($dataCustomerFile);
            }
            $response = [
                'success' => true,
                'message' => 'Upload Location Code Successfull'
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function getImageLocation(Request $request){
        try{
            $data = CustomerFile::leftJoin('customers','customer_files.customer_id','=','customers.id')
            ->select(
                'customer_files.*',
                'customers.customer_name',
                'customers.business_name',
            )->where('customer_files.customer_id',$request->customer_id)->get();
            $response = [
                'success' => true,
                'message' => 'Get date customer image location successfully.',
                'data' => $data
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function numberOfCustomer(Request $request){
        try{
            $total_customer = DB::table('customers')->orderBy('id','DESC')->count();
            $totalAmount = DB::table('customers')->sum('total_fee');
            $response = [
                'success' => true,
                'message' => 'Get number of customer successfully.',
                'total_customer' => $total_customer,
                'total_amount' => $totalAmount,
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get number of customer Not found',
                'status'  => '201'
            ];
            return response()->json($response, 201);
        }
    }
}
