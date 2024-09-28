<?php

use App\Models\Survey;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionCategoryController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['prefix' => 'admins', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'index']);
    Route::resource('company-info', CompanyController::class);

    Route::resource('users', UserController::class);
    Route::get('profile/{id}', [UserController::class,'profile']);
    Route::post('users/onchange', [UserController::class,'onchangeRole']);
    // user log
    Route::get('user-log', [AuditController::class, 'loadData'])->name('user-log');
    Route::resource('permission/category', PermissionCategoryController::class)->names('permission_category');
    Route::post('permission_category_destroy_select', [PermissionCategoryController::class, 'permission_category_destroy_select'])->name('permission_category_destroy.select');

    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::post('permission_destroy_select', [PermissionController::class, 'permission_destroy_select'])->name('permission_destroy.select');
});

Route::get('lang/{locale}', [LanguageController::class, "lang"]);



