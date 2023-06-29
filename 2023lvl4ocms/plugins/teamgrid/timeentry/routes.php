<?php
use Teamgrid\Timeentry\Http\Controllers\TimeEntryController;

Route::prefix('api/v1/timeentry')->group(function () {
    Route::middleware(['auth'])->group (function() 
    {  
    Route::post('start' , [TimeEntryController::class , 'startTimeTracking']);
    Route::post('end/{key}' , [TimeEntryController::class , 'stopTimeTracking']);
});
});