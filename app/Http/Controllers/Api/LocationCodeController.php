<?php

namespace App\Http\Controllers\Api;

use App\Models\LocationCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationCodeController extends Controller
{
    public function searchBlock(Request $request){
        try{
            $Block = LocationCode::where('type','Block')->get();
            $response = [
                'success' => true,
                'message' => 'Get Date Block successfully.',
                'data' => $Block
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date Block Not found.',
                'data' => $e->getMessage()
            ];
            return response()->json($response, 201);
        }
    }
    public function searchSector(Request $request){
        try{
            $Sector = LocationCode::where('type','Sector')->get();
            $response = [
                'success' => true,
                'message' => 'Get Date Sector successfully.',
                'data' => $Sector
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date Sector Not found.',
                'data' => $e->getMessage()
            ];
            return response()->json($response, 201);
        }
    }
    public function searchStreet(Request $request){
        try{
            $Street = LocationCode::where('type','Street')->get();
              $response = [
                'success' => true,
                'message' => 'Get Date Street successfully.',
                'data' => $Street
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date Street Not found.',
                'data' => $e->getMessage()
            ];
            return response()->json($response, 201);
        }
    }
    public function searchSiteofStreet(Request $request){
        try{
            $Site_of_Street = LocationCode::where('type','Site_of_Street')->get();
              $response = [
                'success' => true,
                'message' => 'Get Date Site_of_Street successfully.',
                'data' => $Site_of_Street
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => 'Get Date Site_of_Street Not found.',
                'data' => $e->getMessage()
            ];
            return response()->json($response, 201);
        }
    }
}
