<?php

namespace App\Http\Controllers\Api;

use App\Models\BusinessType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class BusinessTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data = BusinessType::leftJoin('branches','business_types.branch_id','=','branches.id')
            ->leftJoin('users','business_types.created_by','=','users.id')
            ->select(
                'business_types.*',
                'branches.name_kh as bran_name_kh',
                'branches.name_en as bran_name_en',
                'users.name as user_name',
                'users.name as created_by_name'
            )->orderBy('id','DESC')->get();
            $response = [
                'success' => true,
                'message' => 'Get Date business type successfully.',
                'data' => $data
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date business type not foud',
                'status'  => '201'
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
            $businessType = BusinessType::create([
                'user_id'  => Auth::user()->id,
                'branch_id'  => $request->branch_id,
                'name'  => $request->name,
                'created_by'  => Auth::user()->id,
            ]);
            $response = [
                'success' => true,
                'message' => 'Businee Type Create Successfull.',
                'data' => $businessType,
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessType $businessType)
    {
        try{
            return response()->json($businessType);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessType $businessType)
    {
        try{
            return response()->json($businessType);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessType $businessType)
    {
        try{
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['branch_id']  = Auth::user()->branch_id;
            $data['created_by']  = Auth::user()->id;
            $businessType = BusinessType::where('id',$request->id)->update($data);
            $response = [
                'success' => true,
                'message' => 'Updated Businee Type Successfull',
                'data' => $businessType,
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessType $businessType)
    {
        try{
            $response = [
                'success' => true,
                'message' => 'Delete Businee Type successfully',
                'data' => $businessType->delete()
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
