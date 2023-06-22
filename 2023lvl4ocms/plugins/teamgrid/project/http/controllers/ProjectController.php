<?php
 
namespace Teamgrid\Project\Http\Controllers;

use Teamgrid\Project\Models\Project;
use Backend\Classes\Controller;
use Teamgrid\Project\Http\Resources\ProjectResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectController extends Controller
{
 public function show($key) 
 {
      try 
      {
      $project = Project::findOrFail($key);
      $project->due_date = Carbon::parse($project->due_date);
      return new ProjectResource($project); 
      }
      catch (ModelNotFoundException $e) 
      {
         return "ID is not valid";
      }
 }
 public function store()
 {
        $project = new Project();
        $project->name = post("name");
        $project->description = post("description");
        $project->customer_id = post("customer_id");
        $project->project_manager_id = post("project_manager_id");
        $project->due_date = Carbon::parse(post('due_date')) ?: $project->due_date;
        $project->accounting = post("accounting");
        $project->hourly_rate_price = post("hourly_rate_price");
        $project->budget = post("budget");
        $project->is_done = post("is_done");
        $project->save();     
        return new ProjectResource( $project);
 }
 function update($key)
{
    try {
        $project = Project::findOrFail($key);

        $project->name = post("name");
        $project->description = post("description");
        $project->customer_id = post("customer_id");
        $project->project_manager_id = post("project_manager_id");
        $project->due_date = Carbon::parse(post('due_date')) ?: $project->due_date;
        $project->accounting = post("accounting");
        $project->hourly_rate_price = post("hourly_rate_price");
        $project->budget = post("budget");
        $project->is_done = post("is_done");
        $project->save();

        return new ProjectResource($project);
    } catch (ModelNotFoundException $e) 
    {
       return "ID is not valid";
    }
}
function markAsDone($key)
{
   try {
      $project = Project::findOrFail($key);
      $project->is_done = true;
      $project->due_date = Carbon::parse($project->due_date);
      $project->save();     
      return new ProjectResource($project);
   }
   catch (ModelNotFoundException $e) 
   {
      return "ID is not valid";
   }
}
}