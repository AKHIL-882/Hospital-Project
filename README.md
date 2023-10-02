# Hospital-Project

All the routes are stored in api.php file.

Route::get('/doctors', [DoctorController::class,'index']);
Route::get('/doctors/{id}',[DoctorController::class,'show']);
Route::post('/doctors',[DoctorController::class,'store']);
Route::get('/doctors/{doctorId}/appointments', [AppointmentController::class,'getAppointmentsForDoctor']);
Route::post('/appointments', [AppointmentController::class,'store']);
Route::get('/appointments', [AppointmentController::class,'listAppointments']);


You can assess the routes by calling the endpoints in Postman Testing tool

