<?php
use Teamgrid\Project\Http\Controllers\ProjectController;

Route::prefix('api/v1')->group(function () {

    Route::post('project' , [ProjectController::class , 'show']);

    Route::post('projects' , [ProjectController::class , 'store']);

    Route::post('projects/update' , [ProjectController::class , 'update']);

    Route::post('projects/done' , [ProjectController::class , 'markAsDone']);
});