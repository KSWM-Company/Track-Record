<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{

    // get all district for apply all function
    private function getAllData(){
        return District::all();
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
        $data = District::paginate(15);
        return view('district.index',compact('data'));
    }

    public function create()
    {
        return view('district.create');
    }

    public function store(Request $request)
    {
        try{
            $validatorRequest = $this->validatorRequest($request);
            if ($validatorRequest->fails()) {
                return $validatorRequest->getMessageBag();
            }

            District::create($request->all());
            return redirect()->route('district.index');
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function show(District $district)
    {
        try{
            return view('business_type.show')->with('data', $district);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function edit(District $district)
    {
        try{

            return view('district.edit')->with('data', $district);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function update(Request $request, district $district)
    {
        try{
            $validatorRequest = $this->validatorRequest($request);
            if ($validatorRequest->fails()) {
                return $validatorRequest->getMessageBag();
            }

            $district->update($request->all());
            return redirect()->route('district.index');
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function destroy(District $district)
    {
        try {
            $district->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['mg'=>$e->getMessage()]);
        }
    }
}
