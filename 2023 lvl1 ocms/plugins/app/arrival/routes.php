<?php
 use App\Arrival\Models\Arrival;

Route::prefix('api/v1')->group(function () {
    Route::get('arrivals', function () 
    {
        return Arrival::get();
    });

    Route::post('arrivals', function () 
    {            
            $arrival = new Arrival();
            $arrival->name = post("meno");
            $arrival->arrival = now();
            $arrival->save();
            return response()->json($arrival);
    });
});