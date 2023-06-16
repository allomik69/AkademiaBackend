<?php
namespace Teamgrid\Project\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID' => $this->id,
            'Name' => $this->name,
            'Description' => $this->description,
            'Customer ID' => $this->customerID,
            'Project Manager ID' => $this->projectManagerID,
            'Due Date' => $this->dueDate,
            'Accounting' => $this->accounting,
            'Hourly Rate' => $this->hourlyRatePrice,
            'Budget' => $this->budget,
            'Done' => $this->done,            
        ];
    }
}