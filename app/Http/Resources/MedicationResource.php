<?php

namespace App\Http\Resources;

use App\Models\MedicationItem;
use App\Models\Patient;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicationResource extends JsonResource
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
            $status_text = 'Pending';
        }elseif ($this->status == 1){
            $status_text = 'Approved';
        }elseif ($this->status == 2){
            $status_text = 'Received';
        }
        $patient = Patient::find($this->patient_id);
        return [
            'id'=>$this->id,
            'doctor_id'=>$this->doctor_id,
            'patient_id'=>$this->patient_id,
            'date'=>$this->date,
            'note'=>$this->note,
            'patient_name'=>$patient->name,
            'doctor_name'=>'John Doe',
            'patient_ID'=>$patient->patient_id,
            'status'=>$this->status,
            'status_text'=>$status_text,
            'medicines'=> MedicationItemResource::collection($this->medicines),
        ];
    }
}
