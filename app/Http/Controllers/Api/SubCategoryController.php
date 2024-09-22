<?php

namespace App\Http\Controllers\Api;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data = SubCategory::leftJoin('branches','sub_categories.branch_id','=','branches.id')
            ->leftJoin('users','sub_categories.created_by','=','users.id')
            ->leftJoin('business_types','sub_categories.business_type_id','=','business_types.id')
            ->leftJoin('categories','sub_categories.category_id','=','categories.id')
            ->select(
                'sub_categories.*',
                'branches.name_kh as bran_name_kh',
                'branches.name_en as bran_name_en',
                'users.name as user_name',
                'users.name as created_by_name',
                'business_types.name as business_type',
                'categories.name as categorie_name'
            )->orderBy('id','DESC')->get();
            $response = [
                'success' => true,
                'message' => 'Get data sub category successfully.',
                'data' => $data
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get data sub category not found',
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
            $data['user_id'] = Auth::user()->id;
            $data['branch_id'] = Auth::user()->branch_id;
            $data['total_fee'] = $request->monthly_fee + $request->land_filed_fee;
            $data['created_by'] = Auth::user()->id;
            SubCategory::create($data);
            return response()->json(['success'=>'Create Sub Category successfully']);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        try{
            return response()->json($subCategory);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        try{
            return response()->json($subCategory);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function getDataSubCategoryByCategory($id){
        try{
            $data = SubCategory::where('category_id',$id)->get();
            $response = [
                'success' => true,
                'message' => 'Get data sub category by category successfully.',
                'data' => $data
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get data sub category by category not found',
                'status'  => 201
            ];
            return response()->json($response, 201);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        try{
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['branch_id']  = Auth::user()->branch_id;
            $data['updated_by']  = Auth::user()->id;
            $data['monthly_fee'] = $request->monthly_fee;
            $data['land_filed_fee'] = $request->land_filed_fee;
            $data['total_fee'] = $request->monthly_fee + $request->land_filed_fee;
            SubCategory::where('id',$request->id)->update($data);
            return response()->json(['success'=>'Updated Sub Category successfully']);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        try{
            $subCategory->delete();
            return response()->json(['success'=>'Delete Sub Category Successfull']);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
