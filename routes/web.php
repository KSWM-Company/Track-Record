<?php

use App\Models\Survey;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PreSuveyController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\StaffListController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BusinessTypeController;
use App\Http\Controllers\LocationCodeController;
use App\Http\Controllers\LocationListController;
use App\Http\Controllers\CustomerRequestController;
use App\Http\Controllers\PermissionCategoryController;
use App\Http\Controllers\SurveyChangRequestController;
use App\Http\Controllers\CustomerChangRequestController;
use App\Http\Controllers\SurveyChangeRequestBusinessTypeController;
use App\Http\Controllers\CustomerChangRequestBusinessTypeController;
use App\Http\Controllers\MapController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['prefix' => 'admins', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'index']);
    //customer
    Route::resource('customer',CustomerController::class);
    Route::group(['prefix'=>'customer'], function(){
        Route::get('search/location-code',[CustomerController::class,'searchLocationcode']);
        Route::post('category/onchange', [CustomerController::class,'OnchangeCagegory']);
        Route::post('sub-category/change', [CustomerController::class,'changeSubCagegory']);
        Route::get('detail/{id}', [CustomerController::class,'customerDetail']);
        Route::get('chang/request', [CustomerChangRequestController::class,'index']);
        Route::get('chang/request/create', [CustomerChangRequestController::class,'create']);
        Route::post('chang/request/store', [CustomerChangRequestController::class,'store']);
        Route::post('approve', [CustomerChangRequestController::class,'approve']);
        Route::get('change/request/detail/{id}', [CustomerChangRequestController::class,'changeRequestDetail']);
    });
    Route::get('customer/chang/request/autocomplet', [CustomerChangRequestController::class,'customerAutocomplete']);
    Route::get('customer/chang/request/filter', [CustomerChangRequestController::class,'customerChangRequestFilter']);

    Route::resource('users', UserController::class);
    Route::get('profile/{id}', [UserController::class,'profile']);
    Route::post('users/onchange', [UserController::class,'onchangeRole']);
    Route::resource('business-type', BusinessTypeController::class);
    Route::post('business/type/import', [BusinessTypeController::class,'importBusinessType']);
    Route::resource('category', CategoryController::class);
    Route::post('category/import', [CategoryController::class,'importCategory']);
    Route::resource('sub-category', SubCategoryController::class);
    Route::post('sub/category/import', [SubCategoryController::class,'importSubCategory']);
    Route::post('business_type/onchange', [SubCategoryController::class,'Onchange']);
    Route::resource('location-code', LocationCodeController::class);
    Route::resource('branch', BranchController::class);
    Route::resource('staff-list', StaffListController::class);
    Route::resource('currencies', CurrencyController::class);
    Route::resource('payment-type', PaymentTypeController::class);
    Route::resource('company-info', CompanyController::class);
    Route::resource('new-invoice', InvoiceController::class);

    //agreement
    Route::resource('agreement', AgreementController::class);
    Route::get('agreement/detail/{id}', [AgreementController::class,'agreementDetail']);
    Route::get('autocomplete', [AgreementController::class,'autocomplete']);
    Route::get('filter', [AgreementController::class,'agreementFilter']);

    Route::post('switch/branch', [BranchController::class,'switchBranch']);

    // address
    Route::resource('province', ProvinceController::class);
    Route::resource('district', DistrictController::class);
    Route::resource('commune', CommuneController::class);
    Route::resource('village', VillageController::class);
    Route::get('villages/search', [VillageController::class,'villageSearch']);

    // survey
    Route::resource('/survey', SurveyController::class);
    Route::group(['prefix'=>'survey'], function(){
        Route::get('check_dulicate_location/{location}', [SurveyController::class, 'check_dulicate_location']);
        Route::post('category/onchange', [SurveyController::class,'OnchangeCagegory']);
        Route::post('sub-category/onchange', [SurveyController::class,'OnchangeSubCagegory']);
        Route::get('province',[AddressController::class,'province']);
        Route::post('district',[AddressController::class,'district']);
        Route::post('commune',[AddressController::class,'commune']);
        Route::post('village',[AddressController::class,'village']);
    });

    // location List
    Route::resource('location-list', LocationListController::class);
    Route::get('change/request/autocompleted', [SurveyChangRequestController::class,'locationCodeSearch']);
    Route::get('change/request/filters', [SurveyChangRequestController::class,'locationCodeFilter']);
    Route::get('changes-survey', [SurveyChangRequestController::class,'create']);

    // Pre- Survey
    Route::group(['prefix'=>'pre'], function(){
        Route::resource('pre-survey', PreSuveyController::class);
    });

    // user log
    Route::get('user-log', [AuditController::class, 'loadData'])->name('user-log');
    Route::resource('permission/category', PermissionCategoryController::class)->names('permission_category');
    Route::post('permission_category_destroy_select', [PermissionCategoryController::class, 'permission_category_destroy_select'])->name('permission_category_destroy.select');

    Route::resource('permission', PermissionController::class);
    Route::post('permission_destroy_select', [PermissionController::class, 'permission_destroy_select'])->name('permission_destroy.select');

    Route::resource('roles', RoleController::class);

    // Map
    Route::group(['prefix'=>'map'], function(){
        Route::get('survey', [MapController::class, 'showMapSurvey'])->name('showMapSurvey');
        Route::get('customer', [MapController::class, 'showMapCustomer'])->name('showMapCustomer');
        Route::get('pre_survey', [MapController::class, 'showMapPreSurvey'])->name('showMapPreSurvey');
        Route::get('pre_survey/{id}', [MapController::class, 'showMapPreSurveyById'])->name('showMapPreSurveyById');
    });
    #region Map
    Route::group(['prefix'=>'map'], function(){
        Route::get('filter/survey', [MapController::class, 'getFilterSurvey'])->name('getFilterSurvey');
        Route::get('filter/customer', [MapController::class, 'getFilterCustomer'])->name('getFilterCustomer');
        Route::post('filter/per_survey', [MapController::class, 'getFilterPreSurvey'])->name('getFilterPreSurvey');
        Route::get('view_image/pre_survey/{id}', [MapController::class, 'viewImage'])->name('viewImage');
    });

    // Route::middleware('role:writer product')->group(function () {
    Route::group(['middleware' => ['auth']], function() {
        Route::resource('crud', CrudController::class);
    });
});

Route::get('lang/{locale}', [LanguageController::class, "lang"]);



