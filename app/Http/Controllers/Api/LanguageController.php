<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function lang($locale){
        try{
            App::setLocale($locale);
            session()->put('locale', $locale);
            return redirect()->back();
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}