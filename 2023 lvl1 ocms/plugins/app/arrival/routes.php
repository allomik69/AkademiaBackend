<?php
 use app\Arrival\Models\Arrival;


 Route::get('data', function () 
{
    return Arrival::get();
});
Route::post('add', 'App\Arrival\Controllers\Test@add');