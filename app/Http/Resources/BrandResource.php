<?php

namespace App\Http\Resources;

use App\Models\Subcategory;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $subcategory = Subcategory::find($this->subcategory_id);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'subcategory_name'=>$subcategory->name,
            'subcategory_id'=>$this->subcategory_id,
        ];
    }
}
