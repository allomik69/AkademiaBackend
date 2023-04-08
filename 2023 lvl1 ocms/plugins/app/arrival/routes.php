<?php
 use app\Arrival\Models\Arrival;
 

 Route::get('data', function () {
    return Arrival::get();
});







