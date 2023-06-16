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
 function editProject()
 {
   if (post("projectManagerID") == null)
   {
      die ("Project manager ID has not been received");
   }

      $project = Project::where('projectManagerID', post("projectManagerID"))->first();

   if ($project) 
   {
       $project->name = post("name");
       $project->description = post("description");
       $project->customerID = post("customerID");
       $project->dueDate = post("dueDate");
       $project->accounting = post("accounting");
       $project->hourlyRatePrice = post("hourlyRatePrice");
       $project->budget = post("budget");
       $project->save();
       return new ProjectResource($project);
   } 
   
   else 
   {
      return "project manager ID was not found";
   }
}
function finishProject()
{
   if (post("projectManagerID") == null)
   {
      die ("Project manager ID has not been received");
   }

      $project = Project::where('projectManagerID', post("projectManagerID"))->first();

   if ($project) 
   {
      $project->done = true;
      $project->save();
      return new ProjectResource($project);
   }
   else 
   {
      return "project manager ID was not found";
   }
}
}