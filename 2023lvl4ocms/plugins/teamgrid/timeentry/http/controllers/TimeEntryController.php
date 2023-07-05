<?php
 
namespace Teamgrid\TimeEntry\Http\Controllers;

use Teamgrid\Timeentry\Models\TimeEntry;
use Backend\Classes\Controller;
use Teamgrid\Timeentry\Http\Resources\TimeEntryResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
class TimeEntryController extends Controller
{
 public function startTimeTracking()
 {
        $user = auth()->user();

        $timeentry = new TimeEntry;
        $timeentry->task_id = post("task_id");
        $timeentry->user_id = $user->id;
        $timeentry->start_time = Carbon::parse(now()) ?: $timeentry->start_time;
        $timeentry->save();
     return new TimeEntryResource($timeentry);
 }
 public function stopTimeTracking($key)
 {
        $timeentry = TimeEntry::findOrFail($key);
        $timeentry->end_time = Carbon::parse(now()) ?: $timeentry->end_time;
        $timeentry->save();
         return new TimeEntryResource($timeentry);
 }
}