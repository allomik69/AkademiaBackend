<?php
namespace Teamgrid\TimeEntry\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeEntryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'task_id' => $this->task_id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'total_time' => $this->total_time,
            'accounting' => $this->accounting,
            'is_done' => $this->is_done,       
        ];
    }
}