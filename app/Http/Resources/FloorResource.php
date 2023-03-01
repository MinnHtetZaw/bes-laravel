<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class FloorResource extends JsonResource
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
            'name'=>Str::ucfirst($this->name),
            'description'=> Str::ucfirst($this->description),
            'total_no_room'=> $this->total_no_room,
            'total_no_bed'=> $this->total_no_bed,
            'rooms'=> $this->rooms,
            'beds'=> BedResource::collection($this->beds),
        ];
    }
}
