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
   public function index()
   {
      return ProjectResource::collection(Project::all());
   }
 public function show($key) 
 {
   $project = Project::findOrFail($key);
   return new ProjectResource($project); 
 }
 public function store()
 {
   $user = auth()->user();
   $project = new Project();
   $project->name = post("name");
   $project->description = post("description");
   $project->customer_id = $user->id;
   $project->project_manager_id = $user->id;
   $project->customer_name = $user->name;
   $project->project_manager_name = $user->name;
   $project->due_date = Carbon::create(post('due_date'));
   $project->accounting = post("accounting");
   $project->hourly_rate_price = post("hourly_rate_price");
   $project->budget = post("budget");
   $project->is_done = post("is_done");
   $project->save();     
   return new ProjectResource( $project);
 }
 function update($key)
{
   $user = auth()->user();
   $project = Project::findOrFail($key);
   $project->name = post("name") ?: $project->name;
   $project->description = post("description") ?: $project->description;
   $project->customer_name = $user->name;
   $project->project_manager_name = $user->name;
   $project->due_date = Carbon::parse(post('due_date')) ?: $project->due_date;
   $project->accounting = post("accounting") ?: $project->accounting;
   $project->hourly_rate_price = post("hourly_rate_price") ?: $project->hourly_rate_price;
   $project->budget = post("budget") ?: $project->budget;
   $project->is_done = post("is_done") ?: $project->is_done;
   $project->save();
   return new ProjectResource($project);
 
}
function markAsDone($key)
{
   $project = Project::findOrFail($key);
   $project->is_done = true;
   $project->save();     
   return new ProjectResource($project);
}
}