<?php

use App\Http\Controllers\API\V1\TruckLoadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::prefix('calculate')->group(function () {
        Route::post('/truck-load', [TruckLoadController::class, 'calculate']);
    });
});
