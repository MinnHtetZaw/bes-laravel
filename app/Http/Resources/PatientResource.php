<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->type == 0){
            $type_name = 'IP';
        }elseif($this->type == 1){
            $type_name = 'OP';
        }

        if ($this->gender == 0){
            $gender = 'Male';
        }elseif($this->gender == 1){
            $gender = 'Female';
        }
        return [
            'id'=>$this->id,
            'patient_id'=>$this->patient_id,
            'type'=>$this->type,
            'type_name'=>$type_name,
            'name'=>$this->name,
            'age'=>$this->age,
            'gender'=>$gender,
            'phone'=>$this->phone,
            'emergency_phone'=>$this->emergency_phone,
            'work_phone'=>$this->work_phone,
            'email'=>$this->email,
            'date_of_birth'=>$this->date_of_birth,
            'address'=>$this->address,
            'nrc'=>$this->nrc,
            'occupation'=>$this->occupation,
            'nationality'=>$this->nationality,
            'ethnicity'=>$this->ethnicity,
            'visit'=>$this->visit,
            'deposit_amount'=>$this->deposit_amount,
            'total_amount'=>$this->total_amount,
            'credit_amount'=>$this->credit_amount,
            'medical_records'=> MedicalRecordResource::collection($this->medical_records),
        ];
    }
}
