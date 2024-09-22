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


