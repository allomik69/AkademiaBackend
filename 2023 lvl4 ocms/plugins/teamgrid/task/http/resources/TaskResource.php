<?php
namespace Teamgrid\Task\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => $this->user_id,
            'project_id' => $this->project_id,
            'due_date' => $this->due_date,
            'planned_start' => $this->planned_start,
            'planned_end' => $this->planned_end,
            'planned_tim' => $this->planned_time,
            'tags' => $this->tags,
            'done' => $this->is_done,
        ];
        
    }
}