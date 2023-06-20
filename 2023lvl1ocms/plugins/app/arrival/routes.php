<?php
 use App\Arrival\Http\Controllers\ArrivalController;

    Route::prefix('api/v1')->group(function () {
    
    Route::middleware(['auth'])->group (function() 
    {    
    Route::get('arrivals' , [ArrivalController::class , 'index']);

    Route::post('arrivals', [ArrivalController::class , 'store']);

    Route::get('usersArrivals' , [ArrivalController::class , 'getUsersArrivals']);
    });
});