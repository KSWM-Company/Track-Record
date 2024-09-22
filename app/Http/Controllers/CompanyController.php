<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function getAllData(){
        return Company::all();
    }
    public function index()
    {
        $data = Company::first();
        $lang = Helper::getLang(); // Get the current language
        return view('company.edit',compact('data'));
        // return view('company.index')->with('data', $this->getAllData());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('images/companys'), $filename);
        }else{
            $filename = "";
        }
        try{
            Company::create([
                'company_logo'  => $filename,
                'name_kh'  => $request->name_kh,
                'name_en'  => $request->name_en,
                'address_kh'  => $request->address_kh,
                'address_en'  => $request->address_en,
                'phone_number'  => $request->phone_number,
                'email'  => $request->email,
                'website'  => $request->website,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            Toastr::success('Create Company successfully.','Success');
            return redirect('admins/company-info');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Create Company fail','Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        {
            try{
                $data = Company::find($id);
                return view('company.edit',compact('data'));
            }catch(\Exception $e){
                return response()->json(['error'=>$e->getMessage()]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        try{
            if($request->hasFile('company_logo')) {
                $image = $request->file('company_logo');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('storage/companys'), $filename);
            }else{
                $filename = $request->old_profile;
            }
            $full_path = url("storage/companys/".$filename);
            Company::where('id',$request->id)->update([
                'company_logo'  => $full_path,
                'name_kh'  => $request->name_kh,
                'name_en'  => $request->name_en,
                'address_kh'  => $request->address_kh,
                'address_en'  => $request->address_en,
                'phone_number'  => $request->phone_number,
                'email'  => $request->email,
                'website'  => $request->website,
                'updated_by' => Auth::user()->id,
            ]);
            DB::commit();
            Toastr::success('Updated Company Successfull.','Success');
            return redirect('admins/company-info');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Updated Company fail','Error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try{
            $company = Company::find($id);
            $company->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

}
