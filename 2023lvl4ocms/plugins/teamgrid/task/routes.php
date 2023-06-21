<?php
use Teamgrid\Task\Http\Controllers\TaskController;

Route::prefix('api/v1/tasks')->group(function () {

    Route::post('show' , [TaskController::class , 'show']);

    Route::post('store' , [TaskController::class , 'store']);

    Route::post('update' , [TaskController::class , 'update']);

    Route::post('done' , [TaskController::class , 'markAsDone']);
});