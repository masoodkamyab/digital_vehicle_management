<?php

use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::controller(RegisterController::class)->group(function(){
//    Route::post('register', 'register');
//    Route::post('login', 'login');
//});
Route::resource('/workers', \App\Http\Controllers\API\WorkerController::class);
Route::resource('/vehicles', \App\Http\Controllers\API\VehicleController::class);
Route::patch('/vehicle-assign-workers', [\App\Http\Controllers\API\VehicleController::class, 'vehicleAssignWorker']);
Route::resource('/inspections', \App\Http\Controllers\API\InspectionController::class);

Route::get('/import-vehicles',[\App\Http\Controllers\API\VehicleController::class,'import']);
Route::get('/import-inspections',[\App\Http\Controllers\API\InspectionController::class,'import']);
Route::post('/post-files',[\App\Http\Controllers\API\VehicleController::class,'postData']);
