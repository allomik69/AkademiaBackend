<?php
 use App\Arrival\Models\Arrival;
 use LibUser\Userapi\Models\User;
    Route::prefix('api/v1')->group(function () {
    
    Route::middleware(['auth'])->group (function() 
    {    
    Route::get('arrivals' , [\App\Arrival\Http\Controllers\ArrivalController::class , 'index']);

    Route::post('arrivals', [\App\Arrival\Http\Controllers\ArrivalController::class , 'store']);

    Route::get('usersArrivals' , [\App\Arrival\Http\Controllers\ArrivalController::class , 'getUsersArrivals']);
    });
});