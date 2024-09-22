<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{

    // get all province for apply all function
    private function getAllData(){
        return Province::all();
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
        $data = Province::paginate(10);
        return view('province.index',compact('data'));
    }

    public function create()
    {
        return view('province.create');
    }

    public function store(Request $request)
    {
        try{
            $validatorRequest = $this->validatorRequest($request);
            if ($validatorRequest->fails()) {
                return $validatorRequest->getMessageBag();
            }
            Province::create($request->all());
            return redirect()->route('province.index');
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function show(Province $province)
    {
        try{
            return view('province.show')->with('data', $province);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function edit(Province $province)
    {
        try{

            return view('province.edit')->with('data', $province);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function update(Request $request, province $province)
    {
        try{
            $validatorRequest = $this->validatorRequest($request);
            if ($validatorRequest->fails()) {
                return $validatorRequest->getMessageBag();
            }

            $province->update($request->all());
            return redirect()->route('province.index');
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function destroy(Province $province)
    {
        try {
            $province->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['mg'=>$e->getMessage()]);
        }
    }
}
