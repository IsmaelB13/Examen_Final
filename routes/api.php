<?php

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


// Rutas protegidas
Route::group(['middleware' => 'auth:sanctum'], function () {

    // API para pacientes
    Route::apiResource('clientes', App\Http\Controllers\ClientesController::class);
    Route::apiResource('reservas', App\Http\Controllers\ReservasController::class);
    Route::apiResource('vehiculos', App\Http\Controllers\VehiculosController::class);


});
