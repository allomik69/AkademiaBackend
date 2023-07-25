<?php
use Teamgrid\Timeentry\Http\Controllers\TimeEntryController;
use Teamgrid\Timeentry\Http\Middlewares\TimeEntryMiddleware;

Route::prefix('api/v1/timeentry')->group(function () {
    Route::middleware(['auth'])->group (function() 
    {  
    Route::post('start' , [TimeEntryController::class , 'startTimeTracking']);
Route::middleware([TimeEntryMiddleware::class])->group(function () 
    {
    Route::post('end/{key}' , [TimeEntryController::class , 'stopTimeTracking']);
});
});
});