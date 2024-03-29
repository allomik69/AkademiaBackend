<?php
 
namespace Teamgrid\Task\Http\Controllers;

use Teamgrid\Task\Models\Task;
use Backend\Classes\Controller;
use Teamgrid\Project\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Teamgrid\Task\Http\Resources\TaskResource;
use Carbon\Carbon;


class TaskController extends Controller
{
    function show($key) 
    {
      $task = Task::findOrFail($key);
      return new TaskResource($task); 
    }
    function store()
    {
         $project =  Project::where('id', post('project_id'))->firstOrFail();
         $user = auth()->user();
         $task = new Task();
         $task->name = post("name") ;
         $task->description = post("description");
         $task->user_id = $user->id;
         $task->user_name = $user->name;
         $task->project_id = $project->id;
         $task->project_name = $project->name;
         $task->planned_start = Carbon::create(post('planned_start'));
         $task->planned_end = Carbon::create(post('planned_end'));
         $task->due_date = Carbon::create(post('due_date'));
         $task->planned_time = Carbon::create(post('planned_time'));
         $task->tags = post("tags");
         $task->save();     
         return new TaskResource( $task);
      
    }
    function update($key)
{
      $task =Task::findOrFail($key);
      $task->name = post("name")?: $task->name;
      $task->description = post("description")?: $task->description;
      $task->user_id = post("user_id")?: $task->user_id;
      $task->project_id = post("project_id")?: $task->project_id;
      $task->planned_start = Carbon::create(post('planned_start')) ?: $task->planned_start;
      $task->planned_end = Carbon::create(post('planned_end')) ?: $task->planned_end;
      $task->due_date = Carbon::create(post('due_date')) ?: $task->due_date;
      $task->planned_time = Carbon::create(post('planned_time')) ?: $task->planned_time;
      $task->tags = post("tags") ?: $task->tags;
      $task->save();     
      return new TaskResource( $task);
}
function markAsDone($key)
{
      $task =Task::findOrFail($key);
      $task->is_done = true;
      $task->save();     
      return new TaskResource($task);
}
}