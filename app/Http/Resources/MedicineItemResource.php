<?php

namespace App\Http\Resources;

use App\Models\MedicineUnit;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicineItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $medicine = MedicineUnit::find($this->medicine_id);
        return [
            'id'=>$this->id,
            'medical_record_id'=>$this->medical_record_id,
            'medicine_id'=>$this->medicine_id,
            'name'=>$medicine->name,
            'qty'=>$this->qty,
            'day'=>$this->day,
            'dose'=>$this->dose,
            'sig'=>$this->sig,
            'selling_price'=>$this->selling_price,
            'total_qty'=>$this->total_qty,
            'sub_total'=>$this->sub_total,
        ];
    }
}
