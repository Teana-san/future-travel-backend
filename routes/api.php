<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\BookingController;


// RUTAS PARA CLIENTES
Route::post('/login', [AuthController::class, 'login']);
Route::get('/tours', [TourController::class, 'index']);
Route::get('/tours/{id}', [TourController::class, 'show']);
Route::post('/bookings', [BookingController::class, 'store']);
Route::get('/fechas', [TourController::class, 'allDates']);

// RUTAS PROTEGIDAS SOLO PARA ADMIN
Route::middleware('auth:sanctum')->group(function () {
    
    // RESERVAS DEL USUARIO EN PERFIL
    Route::get('/my-bookings', [BookingController::class, 'myBookings']);

    // CONFIGURACION DEL USUARIO EN PERFIL
    Route::get('/user', function (\Illuminate\Http\Request $request) {
        return $request->user();
    });

    // TOURS
    Route::post('/tours', [TourController::class, 'store']);
    Route::put('/tours/{id}', [TourController::class, 'update']);
    Route::delete('/tours/{id}', [TourController::class, 'destroy']);
    
    // BOOKING
    Route::get('/bookings', [BookingController::class, 'index']); 
    Route::get('/bookings/{id}', [BookingController::class, 'show']);
    Route::put('/bookings/{id}', [BookingController::class, 'update']);
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);
    
    Route::post('/logout', [AuthController::class, 'logout']);
});