<?php
 
namespace Teamgrid\Task\Http\Controllers;

use Teamgrid\Task\Models\Task;
use Backend\Classes\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Teamgrid\Task\Http\Resources\TaskResource;
use Carbon\Carbon;


class TaskController extends Controller
{
    function show($key) 
    {
      try 
      {
      $task = Task::findOrFail($key);
      $task->due_date = Carbon::parse($task->due_date);
      $task->planned_start = Carbon::parse($task->planned_start);
      $task->planned_end = Carbon::parse($task->planned_end);
      $task->planned_time = Carbon::parse($task->planned_time);
      return new TaskResource($task); 
      }
      catch (ModelNotFoundException $e) 
      {
         return "ID is not valid";
      }
    }
    function store()
    {
         $task = new Task();
         $task->name = post("name");
         $task->description = post("description");
         $task->user_id = post("user_id");
         $task->project_id = post("project_id");
         $task->planned_start = Carbon::create(post('planned_start')) ?: $task->planned_start;
         $task->planned_end = Carbon::create(post('planned_end')) ?: $task->planned_end;
         $task->due_date = Carbon::create(post('due_date')) ?: $task->due_date;
         $task->planned_time = Carbon::create(post('planned_time')) ?: $task->planned_time;
         $task->tags = post("tags");
         $task->save();     
         return new TaskResource( $task);
      
    }
    function update($key)
{
   try {
      $task =Task::findOrFail($key);
      $task->name = post("name");
      $task->description = post("description");
      $task->user_id = post("user_id");
      $task->project_id = post("project_id");
      $task->planned_start = Carbon::create(post('planned_start')) ?: $task->planned_start;
      $task->planned_end = Carbon::create(post('planned_end')) ?: $task->planned_end;
      $task->due_date = Carbon::create(post('due_date')) ?: $task->due_date;
      $task->planned_time = Carbon::create(post('planned_time')) ?: $task->planned_time;
      $task->tags = post("tags");
      $task->save();     
      return new TaskResource( $task);
  } catch (ModelNotFoundException $e) 
  {
     return "ID is not valid";
  }
}
function markAsDone($key)
{
   try {
      $task =Task::findOrFail($key);
      $task->is_done = true;
      $task->due_date = Carbon::parse($task->due_date);
      $task->planned_start = Carbon::parse($task->planned_start);
      $task->planned_end = Carbon::parse($task->planned_end);
      $task->planned_time = Carbon::parse($task->planned_time);
      $task->save();     
      return new TaskResource($task);
   }
   catch (ModelNotFoundException $e) 
   {
      return "ID is not valid";
   }
}
}