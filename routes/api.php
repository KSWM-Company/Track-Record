<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\APIUserController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\SurveyController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\APIBranchController;
use App\Http\Controllers\Api\PreSurveyController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\BusinessTypeController;
use App\Http\Controllers\Api\LocationCodeController;
use App\Http\Controllers\Api\SurveyLocationController;
use App\Http\Controllers\Api\CustomerLocationController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|   php artisan make:controller Api/UserController --resource --model=User
    php artisan make:model Category -mc --api
*/

Route::post('login',[LoginController::class,'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::middleware('auth:sanctum')->group(function () {
    // return $request->user();
    Route::resource('users', APIUserController::class);
    Route::get('user/profile/{id}', [APIUserController::class,'profile']);
    Route::post('user/change/password', [APIUserController::class,'userChangePassword']);

    Route::resource('survey', SurveyController::class)->names('api.survey');
    Route::resource('location/survey', SurveyLocationController::class)->names('api.location_survey');
    Route::get('number-of-survey', [SurveyController::class,'numberOfSurvey']);
    Route::group(['prefix'=>'survey'], function(){
        Route::get('detail/{id}', [SurveyController::class,'surveyDetail']);
        Route::get('business/type/{id}', [SurveyController::class,'surveyBusinessType']);
        Route::get('location/image/{id}', [SurveyController::class,'getImageLocation']);
        Route::post('upload/location/{id}', [SurveyController::class,'surveyUploadLocation']);
    });
    Route::get('number-of-customer', [CustomerController::class,'numberOfCustomer']);
    Route::resource('customer/location', CustomerLocationController::class)->names('api.customer_location');
    Route::resource('customer', CustomerController::class)->names('api.customer');
    Route::group(['prefix'=>'customer'], function(){
        Route::get('detail/{id}', [CustomerController::class,'customerDetail']);
        Route::get('location/image/{id}', [CustomerController::class,'getImageLocation']);
        Route::post('upload/location/{id}', [CustomerController::class,'customerUploadLocation']);
    });

    Route::group(['prefix'=>'business'], function(){
        Route::resource('/type', BusinessTypeController::class)->names('api.type');
        Route::resource('/category', CategoryController::class)->names('api.category');
        Route::resource('/sub-category', SubCategoryController::class)->names('api.sub_category');
        Route::get('sub-category/category/{id}', [SubCategoryController::class,'getDataSubCategoryByCategory']);
    });

    Route::group(['prefix'=>'location-code'], function(){
        Route::get('block', [LocationCodeController::class,'searchBlock']);
        Route::get('sector', [LocationCodeController::class,'searchSector']);
        Route::get('street', [LocationCodeController::class,'searchStreet']);
        Route::get('site-of-street', [LocationCodeController::class,'searchSiteofStreet']);
    });
    //Pre Survey
    Route::resource('/pre-survey', PreSurveyController::class);
    Route::get('/pre-survey-map', [PreSurveyController::class,'preSurveyMap']);
    Route::get('lang/{locale}', [LanguageController::class, "lang"]);

    Route::resource('/branchs', APIBranchController::class);
    Route::post('switch/branchs', [APIBranchController::class,'switchBranch']);
});


