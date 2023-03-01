<?php

namespace App\Http\Resources;

use App\Models\Floor;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'floor_id'=>$this->floor_id,
            'price_per_day'=>$this->price_per_day,
            'type'=>$this->type,
            'name'=>ucfirst($this->name),
            'description'=>ucfirst($this->description),
        ];
    }
}
