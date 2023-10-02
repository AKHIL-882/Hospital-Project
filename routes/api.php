<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/doctors', [DoctorController::class,'index']);
Route::get('/doctors/{id}',[DoctorController::class,'show']);
Route::post('/doctors',[DoctorController::class,'store']);
Route::get('/doctors/{doctorId}/appointments', [AppointmentController::class,'getAppointmentsForDoctor']);
Route::post('/appointments', [AppointmentController::class,'store']);
Route::get('/appointments', [AppointmentController::class,'listAppointments']);

