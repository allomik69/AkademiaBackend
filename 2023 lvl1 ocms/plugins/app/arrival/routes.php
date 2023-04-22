<?php
 use App\Arrival\Models\Arrival;

Route::prefix('api/v1')->group(function () {
    Route::get('arrivals' , [\App\Arrival\Http\Controllers\ArrivalController::class , 'index']);

    Route::post('arrivals', [\App\Arrival\Http\Controllers\ArrivalController::class , 'store']);
});