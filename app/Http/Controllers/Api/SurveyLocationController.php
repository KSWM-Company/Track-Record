<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SurveyLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data = DB::table('survey_details')
            ->leftJoin('survey_files','survey_details.id','=','survey_files.survey_detail_id')
            ->select(
                'survey_details.id',
                'survey_details.location_code',
                'survey_details.survey_name',
                'survey_details.business_name',
                'survey_details.total_amount',
                'survey_details.location_latitude',
                'survey_details.location_longitude',
                'survey_details.link_map',
                'survey_files.path_name',
                'survey_files.name',
            )->get();
            $response = [
                'success' => true,
                'message' => 'Get date survey location successfully.',
                'data' => $data
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get date survey location not found',
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
