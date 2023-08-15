<?php
 
namespace Teamgrid\TimeEntry\Http\Controllers;

use Teamgrid\Timeentry\Models\TimeEntry;
use Teamgrid\Task\Models\Task;
use Backend\Classes\Controller;
use Teamgrid\Timeentry\Http\Resources\TimeEntryResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
class TimeEntryController extends Controller
{
 public function startTimeTracking()
 {
      $task =  Task::where('id', post('task_id'))->firstOrFail();  
      $user = auth()->user();
        $timeentry = new TimeEntry;
        $timeentry->task_id = $task->id;
        $timeentry->user_name = $user->name;
        $timeentry->user_id = $user->id;
        $timeentry->start_time =Carbon::create(now());
        $timeentry->save();
     return new TimeEntryResource($timeentry);
 }
 public function stopTimeTracking($key)
 {
       $timeentry = TimeEntry::findOrFail($key);
       $timeentry->end_time = Carbon::create(now());
       $timeentry->save();
       return new TimeEntryResource($timeentry);
 }
}