<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CrudController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:crud-list|crud-create|crud-edit|crud-delete', ['only' => ['index','show']]);
         $this->middleware('permission:crud-create', ['only' => ['create','store']]);
         $this->middleware('permission:crud-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:crud-delete', ['only' => ['destroy']]);
    }

    // get all crud for apply all function
    private function getAllData(){
        return Crud::all();
    }

    public function index()
    {
        return view('crud.index')->with('data', $this->getAllData());
    }

    public function create()
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
        try{
            $validation = Validator($request->all(), [
                'name' => 'required',
            ]);
            if ($validation->fails()) {
                return $validation->getMessageBag();
            }

            Crud::create($request->all());
            return redirect()->route('crud.index');
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function show(Crud $crud)
    {
        try{
            return view('business_type.show')->with('data', $crud);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function edit(Crud $crud)
    {
        try{

            return view('crud.edit')->with('data', $crud);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function update(Request $request, Crud $crud)
    {
        try{
            $err = null;
            $validation = Validator($request->all(), [
                'name' => 'required',
            ]);
            if ($validation->fails()) {
               return $validation->getMessageBag();
            }

            $crud->update($request->all());
            return redirect()->route('crud.index');
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function destroy(Crud $crud)
    {
        try {
            $crud->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['mg'=>$e->getMessage()]);
        }
    }
}
