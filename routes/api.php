<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuegoController;

Route::post('/recibir', [JuegoController::class, 'recibir']);
