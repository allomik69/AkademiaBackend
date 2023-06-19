<?php
namespace Teamgrid\Task\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID' => $this->id,
            'Name' => $this->name,
            'Description' => $this->description,
            'User ID' => $this->userID,
            'Project ID' => $this->projectID,
            'Due Date' => $this->dueDate,
            'Planned Start' => $this->plannedStart,
            'Planned End' => $this->plannedEnd,
            'Planned Time' => $this->plannedTime,
            'Tags' => $this->tags,
            'Done' => $this->done,
        ];
        
    }
}