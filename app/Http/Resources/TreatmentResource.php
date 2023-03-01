<?php

namespace App\Http\Resources;

use App\Models\Employee;
use App\Models\Patient;
use Illuminate\Http\Resources\Json\JsonResource;
use Psy\Util\Str;

class TreatmentResource extends JsonResource
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
        $doctor = Employee::find($this->doctor_id);
        return [
            'id'=>$this->id,
            'patient_name'=>$patient->name,
            'doctor_name'=>$doctor->name,
            'diagnosis'=>$this->diagnosis,
            'note'=>$this->note,
            'note_excerpt'=> \Illuminate\Support\Str::words($this->note,5),
            'date'=>$this->date,
        ];
    }
}
