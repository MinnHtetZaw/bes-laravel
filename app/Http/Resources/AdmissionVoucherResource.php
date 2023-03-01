<?php

namespace App\Http\Resources;

use App\Models\Patient;
use Illuminate\Http\Resources\Json\JsonResource;

class AdmissionVoucherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $patient = Patient::find($this->patient_id);
        return [
            'id'=>$this->id,
            'patient_name'=>$patient->name,
            'phone'=>$patient->phone,
            'patient_id'=>$patient->patient_id,
            'hospital_charges'=>$this->hospital_charges,
            'medicine_charges'=>$this->medicine_charges,
            'service_charges'=>$this->service_charges,
            'laboratory_charges'=>$this->laboratory_charges,
            'radiology_charges'=>$this->radiology_charges,
            'total_amount'=>$this->total_amount,
            'pay_amount'=>$this->pay_amount,
            'balance_amount'=>$this->balance_amount,
            'refund_amount'=>$this->refund_amount,
            'payment_type'=>$this->payment_type,
            'date'=>$this->date,
            
        ];
    }
}
