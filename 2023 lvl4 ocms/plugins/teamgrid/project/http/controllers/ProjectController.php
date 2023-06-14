<?php
 
namespace Teamgrid\Project\Http\Controllers;

use Teamgrid\Project\Models\Project;
use Backend\Classes\Controller;
use Teamgrid\Project\Http\Resources\ProjectResource;


class ProjectController extends Controller
{
 function index() 
 {
    return ProjectResource::collection(Project::all());
 }
 function createProject()
 {
        $project = new Project();
        $project-> name = post("name");
        $project-> description = post("description");
        $project-> customerID = post("customerID");
        $project-> projectManagerID = post("projectManagerID");
        $project-> dueDate = post("dueDate");
        $project-> accounting = post("accounting");
        $project-> hourlyRatePrice = post("hourlyRatePrice");
        $project-> budget = post("budget");
        $project-> done = post("done");
        $project->save();     
        return new ProjectResource( $project);
 }
}