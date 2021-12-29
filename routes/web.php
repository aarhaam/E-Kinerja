<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/admin-dashboard', function (){
        return view('admin.home');
    });

    //Dashboard Admin
    Route::get('/employee-activity-admin', [App\Http\Controllers\Admin\DashboardController::class, 'employeeActivity']);

    //employee-admin
    Route::get('/admin-employee', [\App\Http\Controllers\Admin\EmployeeController::class, 'index']);
    Route::get('/employee-data', [\App\Http\Controllers\Admin\EmployeeController::class, 'show']);
    Route::get('/get-employee-data/{id}', [\App\Http\Controllers\Admin\EmployeeController::class, 'edit']);
    Route::post('/add-employee', [\App\Http\Controllers\Admin\EmployeeController::class, 'store']);
    Route::put('/update-employee/{id}', [\App\Http\Controllers\Admin\EmployeeController::class, 'update']);
    Route::delete('/delete-employee/{id}', [\App\Http\Controllers\Admin\EmployeeController::class, 'destroy']);


    //indicator-admin
    Route::get('/admin-indicator', [App\Http\Controllers\Admin\IndicatorWorkController::class, 'index']);
    Route::get('/indicator-data', [App\Http\Controllers\Admin\IndicatorWorkController::class, 'show']);
    Route::get('/get-indicator-data/{id}', [App\Http\Controllers\Admin\IndicatorWorkController::class, 'edit']);
    Route::post('/add-indicator', [App\Http\Controllers\Admin\IndicatorWorkController::class, 'store']);
    Route::put('/update-indicator/{id}', [App\Http\Controllers\Admin\IndicatorWorkController::class, 'update']);
    Route::delete('/delete-indicator/{id}', [App\Http\Controllers\Admin\IndicatorWorkController::class, 'destroy']);

    //subordinate-admin
    Route::get('/admin-structural', [App\Http\Controllers\Admin\SubordinateController::class, 'index']);
    Route::get('/head-data', [App\Http\Controllers\Admin\SubordinateController::class, 'headData']);
    Route::get('/get-subordinate-data/{id}', [App\Http\Controllers\Admin\SubordinateController::class, 'edit']);
    Route::post('/add-subordinate', [App\Http\Controllers\Admin\SubordinateController::class, 'store']);
    Route::put('/update-subordinate-head/{id}', [App\Http\Controllers\Admin\SubordinateController::class, 'update']);
    Route::delete('/delete-subordinate/{id}', [App\Http\Controllers\Admin\SubordinateController::class, 'destroy']);

    //employee-activity
    Route::get('/employee-dashboard', [App\Http\Controllers\Employee\ProgressWorkController::class, 'index']);
    Route::post('/add-activity', [App\Http\Controllers\Employee\ProgressWorkController::class, 'store']);
    Route::get('/employee-activity', [App\Http\Controllers\Employee\ProgressWorkController::class, 'show']);
    Route::get('/get-employee-activity/{id}', [App\Http\Controllers\Employee\ProgressWorkController::class, 'edit']);
    Route::put('/update-employee-activity/{id}', [App\Http\Controllers\Employee\ProgressWorkController::class, 'update']);
    Route::delete('/delete-activity/{id}', [App\Http\Controllers\Employee\ProgressWorkController::class, 'destroy']);


    //indicator
    Route::get('/employee-indicator', [App\Http\Controllers\Employee\ProgressWorkController::class, 'indicatorData']);


    //employee-subordinate-performance
    Route::get('/employee-subordinate-performance', [App\Http\Controllers\Employee\SubordinatePerformanceController::class, 'index']);
    Route::get('/subordinate-performance-data', [App\Http\Controllers\Employee\SubordinatePerformanceController::class, 'show']);
    Route::get('/subordinate-performance-data/{id}', [App\Http\Controllers\Employee\SubordinatePerformanceController::class, 'performance']);
    Route::put('/subordinate-grade-data', [App\Http\Controllers\Employee\SubordinatePerformanceController::class, 'update']);
});
