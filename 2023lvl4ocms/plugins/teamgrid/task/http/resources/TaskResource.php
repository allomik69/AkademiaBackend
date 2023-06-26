<?php
namespace Teamgrid\Task\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Teamgrid\Project\Models\Project;
use Teamgrid\Project\Http\Resources\ProjectResource;

use LibUser\UserApi\Http\Resources\UserResource;
use RainLab\User\Models\User;

class TaskResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'user' =>  new UserResource(User::findOrFail($this->user_id)),
            'project' => new ProjectResource(Project::findOrFail($this->project_id)),
            'due_date' => $this->due_date,
            'planned_start' => $this->planned_start,
            'planned_end' => $this->planned_end,
            'planned_time' => $this->planned_time,
            'tags' => $this->tags,
            'done' => $this->is_done,
        ];
        
    }
}