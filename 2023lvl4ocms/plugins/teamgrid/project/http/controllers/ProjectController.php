<?php
 
namespace Teamgrid\Project\Http\Controllers;

use Teamgrid\Project\Models\Project;
use Backend\Classes\Controller;
use Teamgrid\Project\Http\Resources\ProjectResource;
use Carbon\Carbon;

class ProjectController extends Controller
{
 public function show() 
 {
      $project = Project::where('id', post("id"))->firstOrFail();
       return new ProjectResource($project); 
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
 function update()
 {
     try 
     {
      $project = Project::where('id', post("id"))->firstOrFail();

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
      } 
      catch (ModelNotFoundException $e) 
      {
     }

}
function markAsDone()
{
   $project = Project::where('id', post("id"))->firstOrFail();
   $project->is_done = true;
   $project->save();     
   return new ProjectResource($project);
}
}