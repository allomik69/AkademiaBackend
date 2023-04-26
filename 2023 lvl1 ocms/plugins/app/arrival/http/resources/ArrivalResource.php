<?php
namespace App\Arrival\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
 
class ArrivalResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'arrival' => $this->arrival,
        ];
    }
}