<?php
use Teamgrid\Task\Http\Controllers\TaskController;

Route::prefix('api/v1')->group(function () {

    Route::get('tasks' , [TaskController::class , 'index']);

    Route::post('createTask' , [TaskController::class , 'createTask']);

    Route::post('editTask' , [TaskController::class , 'editTask']);

    Route::post('finishTask' , [TaskController::class , 'finishTask']);
});