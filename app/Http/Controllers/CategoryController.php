<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use App\Imports\CategoryImport;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        RolePermission($this, 'Category');
    }
    public function index()
    {
        $branchId = Session::get('branch_id');
        $dataBusinessType = BusinessType::all();
        if (Auth::user()->RolePermission =='Staff') {
            $data = Category::where('user_id')->where('branch_id',$branchId)->get();
        } else {
            $data = Category::all();
        }
        return view('category.index',compact('data','dataBusinessType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try{
            // dd($request->all());
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['branch_id'] = Auth::user()->branch_id;
            $data['created_by'] = Auth::user()->id;
            Category::create($data);
            DB::commit();
            Toastr::success('Create Category Successfull.','Success');
            return redirect('admins/category');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create Category fail','Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $data = Category::find($id);
            // return view('payment_types.edit',compact('data'));
            return response()->json([
                'success'=>$data
        ]);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
    public function create()
    {
        $data = Category::all();
        $dataBusinessType = BusinessType::all();
        return view('category.create',compact('data','dataBusinessType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            // dd($request->all());
            Category::where('id',$request->id)->update([
                'user_id' => Auth::user()->id,
                'name'  => $request->name,
                'business_type_id'  => $request->business_type_id,
                'branch_id' => Auth::user()->branch_id,
                'updated_by' => Auth::user()->id,
            ]);

            DB::commit();
            Toastr::success('Updated Category Successfull.','Success');
            return redirect('admins/category');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Updated Category fail','Error');
            return redirect()->back();
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
            $category->delete();
            return response()->json(['mg'=>'success'], 200);
         }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function importCategory(Request $request){
        try{
            $request->validate([
                'file' => 'required|mimes:xlsx,xls',
            ]);
            $extension = $request->file('file')->extension();
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                Excel::import(new CategoryImport, $request->file('file'));
            }
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
 }
