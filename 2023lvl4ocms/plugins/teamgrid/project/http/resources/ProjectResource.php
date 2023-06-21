<?php
namespace Teamgrid\Project\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'customer_id' => $this->customer_id,
            'project_manager_id' => $this->project_manager_id,
            'due_date' => $this->due_date->format('Y-m-d\TH:i'),
            'accounting' => $this->accounting,
            'hourly_rate_price' => $this->hourly_rate_price,
            'budget' => $this->budget,
            'is_done' => $this->is_done,       
        ];
    }
}