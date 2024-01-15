<?php

use App\Http\Resources\AppointmentCollection;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('maintenance-appointments/{user_id}', function($user_id) {
    $appointmentsCurrentUser = Appointment::where('user_id', $user_id)->get();
    return new AppointmentCollection($appointmentsCurrentUser);
});

Route::get('all-maintenance-appointments', function() {
    $appointments = Appointment::all();
    return $appointments;
});
