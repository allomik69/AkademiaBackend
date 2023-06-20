<?php
use Teamgrid\Task\Http\Controllers\TaskController;

Route::prefix('api/v1')->group(function () {

    Route::post('task' , [TaskController::class , 'show']);

    Route::post('tasks' , [TaskController::class , 'store']);

    Route::post('tasks/update' , [TaskController::class , 'update']);

    Route::post('tasks/done' , [TaskController::class , 'markAsDone']);
});