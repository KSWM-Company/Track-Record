<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data = Category::leftJoin('branches','categories.branch_id','=','branches.id')
            ->leftJoin('business_types','categories.business_type_id','=','business_types.id')
            ->select(
                'categories.*',
                'branches.name_kh as bran_name_kh',
                'branches.name_en as bran_name_en',
                'business_types.name as business_type'
            )->orderBy('id','DESC')->get();
            $response = [
                'success' => true,
                'message' => 'Get date category successfully.',
                'data' => $data
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date category not found',
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
            $data['created_by'] = Auth::user()->id;
            $cat = Category::create($data);

            $response = [
                'success' => true,
                'message' => 'Create Category successfully',
                'data' => $cat
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        try{
            $response = [
                'success' => true,
                'message' => 'Create Category successfully',
                'data' => $category
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        try{
            return response()->json($category);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try{
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['branch_id']  = Auth::user()->branch_id;
            $data['updated_by']  = Auth::user()->id;
            $category = Category::where('id',$request->id)->update($data);
            $response = [
                'success' => true,
                'message' => 'Updated Category successfully',
                'data' => $category
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try{
            $response = [
                'success' => true,
                'message' => 'Delete Category successfully',
                'data' => $category->delete()
            ];
            return response()->json($response, 201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
