<?php
 
namespace Teamgrid\Task\Http\Controllers;

use Teamgrid\Task\Models\Task;
use Backend\Classes\Controller;
use Teamgrid\Task\Http\Resources\TaskResource;
use Carbon\Carbon;


class TaskController extends Controller
{
    function show() 
    {
      $task = Task::where('id', post("id"))->firstOrFail();
      return new TaskResource($task); 
    }
    function store()
    {
           $task = new Task();
           $task->name = post("name");
           $task->description = post("description");
           $task->userID = post("userID");
           $task->projectID = post("projectID");
           $task->plannedStart = Carbon::create(post('plannedStart')) ?: $task->plannedStart;
           $task->plannedEnd = Carbon::create(post('plannedEnd')) ?: $task->plannedEnd;
           $task->dueDate = Carbon::create(post('dueDate')) ?: $task->dueDate;
           $task->plannedTime = post("plannedTime");
           $task->tags = post("tags");
           $task->save();     
           return new TaskResource( $task);
    }
    function update()
 {
   if (post("projectID") == null)
   {
      die ("Project ID has not been received");
   }

      $task = Task::where('projectID', post("projectID"))->first();

   if ($task) 
   {
       $task->name = post("name");
       $task->description = post("description");
       $task->userID = post("userID");
       $task->plannedStart = Carbon::create(post('plannedStart')) ?: $task->plannedStart;
       $task->plannedEnd = Carbon::create(post('plannedEnd')) ?: $task->plannedEnd;
       $task->dueDate = Carbon::create(post('dueDate')) ?: $task->dueDate;
       $task->plannedTime = post("plannedTime");
       $task->tags = post("tags");
       $task->save();
       return new TaskResource($task);
   } 
   
   else 
   {
      return "project ID was not found";
   }
}
function markAsDone()
{
    if (post("projectID") == null)
    {
       die ("Project ID has not been received");
    }
       $task = Task::where('projectID', post("projectID"))->first();
   if ($task) 
   {
      $task->done = true;
      $task->save();
      return new TaskResource($task);
   }
   else 
   {
      return "project ID was not found";
   }
}
}