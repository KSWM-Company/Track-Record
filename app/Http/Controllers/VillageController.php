<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VillageController extends Controller
{

    // get all province for apply all function
    private function getAllData(){
        return Village::all();
    }
    private function validatorRequest($request){
        $validation = Validator($request->all(), [
            'khmer' => 'required',
            'english' => 'required',
        ]);
        return $validation;
    }

    public function villageSearch(Request $request){
        $data = Village::where('khmer', 'like',  '%' . $request->search . '%')
        ->orWhere('english', 'like', '%' . $request->search . '%')
        ->orWhere('code', 'like', '%' . $request->search . '%')
        ->orderBy('id','desc')->get();
        return response()->json(['success'=>$data]);
        // return view('village.index',compact('data'));
    }
    public function index()
    {
        $data = Village::paginate(10);
        return view('village.index',compact('data'));
    }

    public function create()
    {
        return view('village.create');
    }

    public function store(Request $request)
    {
        try{
            $validatorRequest = $this->validatorRequest($request);
            if ($validatorRequest->fails()) {
                return $validatorRequest->getMessageBag();
            }

            Village::create([
                'commune_code'   => $request->commune_code,
                'code'   => $request->code,
                'khmer'   => $request->khmer,
                'english'   => $request->english,
                'reference'   => $request->reference,
                'official_note'   => $request->official_note,
                'note_by_checker'   => $request->note_by_checker,
            ]);
            return redirect()->route('village.index');
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function show($id)
    {
        try{
            $data = Village::find($id);
            return view('village.edit',compact('data'));
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try{

            Village::where('id',$request->id)->update([
                'commune_code'   => $request->commune_code,
                'code'   => $request->code,
                'khmer'   => $request->khmer,
                'english'   => $request->english,
                'reference'   => $request->reference,
                'official_note'   => $request->official_note,
                'note_by_checker'   => $request->note_by_checker,
            ]);
            DB::commit();
            Toastr::success('Updated Viilage Successfull.','Success');
            return redirect('admins/village');
        } catch(\Exception $e){
            DB::rollback();
            Toastr::error('Updated Viilage fail','Error');
            return redirect()->back();
        }
    }


    public function destroy(Village $village)
    {
        try{
            $village->delete();
            return response()->json(['mg'=>'success'], 200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
