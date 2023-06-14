<?php
use Teamgrid\Project\Http\Controllers\ProjectController;

Route::prefix('api/v1')->group(function () {

    Route::get('projects' , [ProjectController::class , 'index']);

    Route::post('createProject' , [ProjectController::class , 'createProject']);

    Route::post('editProject' , [ProjectController::class , 'editProject']);
});