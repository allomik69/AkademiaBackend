<?php
use Teamgrid\Task\Http\Controllers\TaskController;

Route::prefix('api/v1/tasks')->group(function () {

    Route::middleware(['auth'])->group (function() 
    {  
        Route::post('show/{key}' , [TaskController::class , 'show']);

        Route::post('store' , [TaskController::class , 'store']);

        Route::post('update/{key}' , [TaskController::class , 'update']);

        Route::post('done/{key}' , [TaskController::class , 'markAsDone']);
    });
});