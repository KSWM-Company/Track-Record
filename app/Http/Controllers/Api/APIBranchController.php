<?php

namespace App\Http\Controllers\Api;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class APIBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data = Branch::where('user_id',Auth::user()->id)->get();
            $response = [
                'success' => true,
                'message' => 'Get Date Branch successfully.',
                'data' => $data
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date Branch Not found',
                'status'  => 201
            ];
            return response()->json($response, 201);
        }
    }

    public function switchBranch(Request $request)
    {
        $branchId = $request->input('branch_id');
        // Check if the branch ID belongs to the authenticated user
        $user = Auth::user();
        if ($user->branches()->where('branch_id', $branchId)->exists()) {
            // Set the new branch ID in session
            Session::put('branch_id', $branchId);
            $user->update([
                'branch_default' => $branchId
            ]);
            $response = [
                'success' => true,
                'message' => 'Branch switched successfully!',
                'data' => null
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => 'Switch Branch fail found',
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
