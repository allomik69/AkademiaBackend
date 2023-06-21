<?php
use Teamgrid\Project\Http\Controllers\ProjectController;

Route::prefix('api/v1/projects')->group(function () {

    Route::post('show' , [ProjectController::class , 'show']);

    Route::post('store' , [ProjectController::class , 'store']);

    Route::post('update' , [ProjectController::class , 'update']);

    Route::post('done' , [ProjectController::class , 'markAsDone']);
});