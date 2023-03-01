<?php

namespace App\Http\Resources;

use App\Models\MedicineUnit;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicationItemResource extends JsonResource
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
        $total_qty = $this->day * $this->qty;
        return [
            'id'=>$this->id,
            'medication_id'=>$this->medication_id,
            'medicine_id'=>$this->medicine_id,
            'name'=>$medicine->name,
            'qty'=>$this->qty,
            'day'=>$this->day,
            'dose'=>$this->dose,
            'sig'=>$this->sig,
            'selling_price'=>$medicine->selling_price,
            'total_qty'=> $total_qty,
            'total_price'=> $total_qty * $medicine->selling_price,
        ];
    }
}
