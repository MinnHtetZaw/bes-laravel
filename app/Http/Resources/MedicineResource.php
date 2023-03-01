<?php

namespace App\Http\Resources;

use App\Models\Brand;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $brand = Brand::find($this->brand_id);
        return [
            'id'=>$this->id,
            'code'=>$this->code,
            'name'=>$this->name,
            'description'=>$this->description,
            'brand_id'=>$this->brand_id,
            'brand_name'=>$brand->name,
            'units'=>MedicineUnitResource::collection($this->units),
        ];
    }
}
