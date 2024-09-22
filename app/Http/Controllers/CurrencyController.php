<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        RolePermission($this, 'Currency');
    }
    private function getAllData(){
        return Currency::orderBy('exchange_date','DESC')->get();
    }
    public function index()
    {
        return view('currencies.index')->with('data', $this->getAllData());
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
            $exchange_date = Carbon::createFromDate($request->exchange_date)->format('Y-m-d');
            Currency::create([
                'name'  =>$request->name,
                'amount_usd'  => $request->amount_usd,
                'amount_riel'  => $request->amount_riel,
                'exchange_date' => $exchange_date,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            Toastr::success('Create Currency successfully.','Success');
            return redirect('admins/currencies');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create Currency fail','Error');
            return redirect()->back();
        }
    }

    public function create()
    {

        $data = Currency::all();
        return view('currencies.create',compact('data'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $data = Currency::find($id);
            return view('currencies.edit',compact('data'));
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{

            Currency::where('id',$request->id)->update([
            'name'  =>$request->name,
            'amount_usd'  => $request->amount_usd,
            'amount_riel'  => $request->amount_riel,
            'exchange_date' => $request->exchange_date,
            'updated_by' => Auth::user()->id,
        ]);
        DB::commit();
        Toastr::success('Create Users successfully.','Success');
        return redirect('admins/currencies');
    }catch(\Exception $e){
        DB::rollback();
        Toastr::error('Create Users fail','Error');
        return redirect()->back();
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        try{
            $currency->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }

    }
}
