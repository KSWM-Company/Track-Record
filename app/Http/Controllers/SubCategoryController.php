<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use App\Imports\SubCategoryImport;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:Sub Category View', ['only' => ['index']]);
        // $this->middleware('permission:Sub Category Create', ['only' => ['create','store']]);
        // $this->middleware('permission:Sub Category Edit', ['only' => ['update','edit']]);
        // $this->middleware('permission:Sub Category Delete', ['only' => ['destroy']]);
        RolePermission($this, 'Sub Category');
    }
    public function index()
    {
        $branchId = Session::get('branch_id');
        $dataCategory = Category::all();
        $dataBusinessType = BusinessType::all();
        if (Auth::user()->RolePermission =='Staff') {
            $data = SubCategory::where('user_id',Auth::user()->id)->where('branch_id',$branchId)->get();
        } else {
            $data = SubCategory::all();
        }
        return view('sub_category.index',compact('data','dataCategory','dataBusinessType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        try{
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['branch_id'] = Auth::user()->branch_id;
            $data['total_fee'] = $request->monthly_fee + $request->land_filed_fee;
            $data['created_by'] = Auth::user()->id;
            SubCategory::create($data);
            DB::commit();
            Toastr::success('Create Sub Category successfully.','Success');
            return redirect('admins/sub-category');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create SubCategory fail','Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $data = SubCategory::find($id);
            return response()->json([
            'success'=>$data
        ]);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function create()
    {
        $data = SubCategory::all();
        $dataCategory = Category::all();
        $dataBusinessType = BusinessType::all();
        return view('sub_category.create',compact('data','datacategory','dataBusinessType'));
    }
    public function Onchange(Request $request){
        $dataCategory = Category::where('business_type_id',$request->business_type_id)->get();
        return response()->json([
            'data'=>$dataCategory,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            SubCategory::where('id',$request->id)->update([
                'user_id' => Auth::user()->id,
                'branch_id' => Auth::user()->branch_id,
                'category_id'  => $request->category_id,
                'business_type_id'  => $request->business_type_id,
                'name'  => $request->name,
                'unit'  => $request->unit,
                'monthly_fee'  => $request->monthly_fee,
                'land_filed_fee'  => $request->land_filed_fee,
                'total_fee'  => $request->monthly_fee + $request->land_filed_fee,
                'noted' => $request->noted,
                'updated_by' => Auth::user()->id,
            ]);
            DB::commit();
            Toastr::success('Updated Sub Category successfully.','Success');
            return redirect('admins/sub-category');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Updated location code fail','Error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */

     public function destroy(SubCategory $sub_category)
     {
        try{
            $sub_category->delete();
            return response()->json(['mg'=>'success'], 200);
         }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function importSubCategory(Request $request){
        try{
            $request->validate([
                'file' => 'required|mimes:xlsx,xls',
            ]);
            $extension = $request->file('file')->extension();
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                Excel::import(new SubCategoryImport, $request->file('file'));
            }
            DB::commit();
            Toastr::success('Excel file imported successfully.','Success');
            return redirect('admins/sub-category');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Excel file imported fail','Error');
            return redirect()->back();
        }
    }
 }

