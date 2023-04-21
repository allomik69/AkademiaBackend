<?php
 use App\Arrival\Models\Arrival;

Route::prefix('api/v1')->group(function () {
    Route::get('arrivals' , [\App\Arrival\Http\Controllers\ArrController::class , 'getArrivals']);

    Route::post('arrivals', [\App\Arrival\Http\Controllers\ArrController::class , 'addArrivals']);
});