<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Traits\Generate;
use App\Models\Agreement;
use App\Models\StaffList;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class AgreementController extends Controller
{
    use Generate;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('agreements')
        ->leftJoin('branches','agreements.branch_id','=', 'branches.id')
        ->select(
            'agreements.*',
            'branches.name_kh',
            'branches.name_en',
        )->get();
        return view('agreements.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = StaffList::all();
        return view('agreements.create',compact('staff'));
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
            // dd($request->all());
            $data = $request->all();
            $agreementNo = $this->GenerateAgreementNo();
            $data['agreement_no'] = $agreementNo;
            $data['created_by'] = Auth::user()->id;
            $data['branch_id'] = Auth::user()->branch_id;
            Agreement::create($data);
            DB::commit();
            Toastr::success('Create agreement Successfull.','Success');
            return redirect('admins/agreement');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create agreement fail','Error');
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
        $staff = StaffList::all();
        $agreementNo = $this->GenerateAgreementNo();
        $data = Customer::with(['customersHavBusiness','customerImage','staff'])->where('id',$id)->first();
        return view('agreements.create_agreement',compact('data','staff','agreementNo'));
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

    public function agreementDetail($id){
        try{
            $data = Agreement::leftJoin('currencies','agreements.currency','=', 'currencies.id')
            ->leftJoin('staff_lists','agreements.staff_id','=', 'staff_lists.id')
            ->select(
                'agreements.*',
                'currencies.name as currecy_name',
                'staff_lists.name as staff_name',
            )->where('agreements.id',$id)->first();
            return view('agreements.detail',compact('data'));
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function autocomplete(Request $request): JsonResponse{
        try{
            $search = $request->customer_no;
            $data = DB::table("customers")->select("id","customer_no")->where('customer_no','LIKE',"%$search%")->pluck('customer_no');
            return response()->json($data);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function agreementFilter(Request $request){
        try{

            $data = DB::table('customers')
                ->leftJoin('tb_province','customers.province','=', DB::raw("CONVERT(tb_province.code USING utf8)"))
                ->leftJoin('tb_district','customers.district','=', DB::raw("CONVERT(tb_district.code USING utf8)"))
                ->leftJoin('tb_commune','customers.commune','=', DB::raw("CONVERT(tb_commune.code USING utf8)"))
                ->leftJoin('tb_village','customers.village','=', DB::raw("CONVERT(tb_village.code USING utf8)"))
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
                )->where('customer_no',$request->search)->first();
            return response()->json($data);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
