<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuegoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/iniciar', [JuegoController::class, 'iniciar']);
Route::post('/recibir', [JuegoController::class, 'recibir']);
