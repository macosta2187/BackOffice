<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\PaqueteController;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/crearLotes', [LoteController::class, 'crearLotes']);