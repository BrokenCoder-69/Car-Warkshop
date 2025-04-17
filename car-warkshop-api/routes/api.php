<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MechanicController;

// Get authenticated user (for testing)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// -------------------------------
//  Admin Routes
// -------------------------------

// Admin Login
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// Admin Protected Routes
Route::middleware(['auth:sanctum', AdminMiddleware::class])->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'logout']);

    // Test route (optional)
    Route::get('/admin/test', function () {
        return response()->json(['message' => 'You are an authenticated admin']);
    });

    // Admin: View and Delete Appointments
    Route::get('/admin/appointments', [AppointmentController::class, 'index']);
    Route::delete('/admin/appointments/{id}', [AppointmentController::class, 'destroy']);

    
    Route::get('/admin/clients', [AdminAuthController::class, 'getClient']);
    Route::patch('/admin/update_information/{id}', [AdminAuthController::class, 'update']);
});


// -------------------------------
//  Client Routes (auth required)
// -------------------------------

Route::middleware(['auth:sanctum'])->group(function () {
    // Client: Book Appointment
    Route::post('/appointments', [AppointmentController::class, 'store']);
});


Route::post('/client/appointment', [AppointmentController::class, 'create_appointment']);
Route::get('/mechanics', [MechanicController::class, 'index']);