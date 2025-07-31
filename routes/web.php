<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;

Route::get('/', [VehiculoController::class, 'index']);

Route::resource('vehiculos', VehiculoController::class);
