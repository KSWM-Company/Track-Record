<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BusinessTypeRequest;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        RolePermission($this, 'Payment Teype');
    }
    private function getAllData(){
        return PaymentType::all();
    }

    public function index()
    {
        return view('payment_types.index')->with('data', $this->getAllData());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessTypeRequest $request)
    {
        try{
            PaymentType::create([
            'name'  =>$request->name,
            'created_by' => Auth::user()->id,
        ]);
        DB::commit();
        Toastr::success('Create Payment Type successfully.','Success');
        return redirect('admins/payment-type');
    }catch(\Exception $e){
        DB::rollback();
        Toastr::error('Create Payment Type fail','Error');
        return redirect()->back();
    }
    }
    public function create()
    {
        $data = PaymentType::all();
        return view('payment_types.create',compact('data'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        try{
            $data = PaymentType::find($id);
            return response()->json([
                'success'=>$data
            ]);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            PaymentType::where('id',$request->id)->update([
                'name'  =>$request->name,
                'updated_by' => Auth::user()->id,
            ]);
            DB::commit();
            Toastr::success('Create Payment Type successfully.','Success');
            return redirect('admins/payment-type');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create Payment Type fail','Error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentType $paymentType)
    {
        try{
            $paymentType->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
