<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HospitalBillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->status == 0){
            $status_name = 'Unpaid';
        }elseif ($this->status == 1){
            $status_name = 'Paid';
        }
        return [
            'id'=>$this->id,
            'date'=>$this->date,
            'status'=>$this->status,
            'status_name'=>$status_name,
            'room_charges'=>$this->room_charges,
            'service_charges'=>$this->service_charges,
            'medicine_charges'=>$this->medicine_charges,
            'machine_charges'=>$this->machine_charges,
            'total_amount'=>$this->total_amount,
            'deposit_amount'=>$this->deposit_amount,
            'net_amount'=>$this->net_amount,
        ];
    }
}
