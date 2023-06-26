<?php
namespace Teamgrid\TimeEntry\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Teamgrid\Task\Http\Resources\TaskResource;


use LibUser\UserApi\Http\Resources\UserResource;
use RainLab\User\Models\User;


use Teamgrid\Task\Models\Task;


class TimeEntryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
        'user' =>  new UserResource(User::findOrFail($this->user_id)),
        'task' => new TaskResource(Task::findOrFail($this->task_id)),
        'start_time' => $this->start_time,
        'end_time' => $this->end_time,
        'total_time' => $this->total_time,
        'accounting' => $this->accounting,
        'is_done' => $this->is_done,
   
        ];
    }
}