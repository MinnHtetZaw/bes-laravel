<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicineUnitResource extends JsonResource
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
            'medicine_id'=>$this->medicine_id,
            'code'=>$this->code,
            'name'=>$this->name,
            'current_qty'=>$this->current_qty,
            'reorder_qty'=>$this->reorder_qty,
            'purchase_price'=>$this->purchase_price,
            'selling_price'=>$this->selling_price,
            'description'=>$this->description,
        ];
    }
}
