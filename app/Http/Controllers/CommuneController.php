<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CommuneController extends Controller
{

    // get all commune for apply all function
    private function getAllData(){
        return Commune::all();
    }
    private function validatorRequest($request){
        $validation = Validator($request->all(), [
            'khmer' => 'required',
            'english' => 'required',
        ]);
        return $validation;
    }

    public function index()
    {
        $data = Commune::with('cammuneVillage')->paginate(10);
        return view('commune.index',compact('data'));
    }

    public function create()
    {
        return view('commune.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $validatorRequest = $this->validatorRequest($request);
        // if ($validatorRequest->fails()) {
        //     return $validatorRequest->getMessageBag();
        // }
        // try{
            $data = $request->all();
            Commune::create($data);
            DB::commit();
            Toastr::success('Create Commune Successfull.','Success');
            return redirect('admins/commune');
        // }catch(\Exception $e){
        //     DB::rollback();
        //     Toastr::error('Create Commune fail','Error');
        //     return redirect()->back();
        // }
    }

    public function show(Commune $commune)
    {
        try{
            return view('commune.show')->with('data', $commune);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function edit(Commune $commune)
    {
        try{

            return view('commune.edit')->with('data', $commune);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function update(Request $request, commune $commune)
    {
        try{
            $validatorRequest = $this->validatorRequest($request);
            if ($validatorRequest->fails()) {
                return $validatorRequest->getMessageBag();
            }

            $commune->update($request->all());
            return redirect()->route('commune.index');
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function destroy(Commune $commune)
    {
        try {
            $commune->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['mg'=>$e->getMessage()]);
        }
    }
}
