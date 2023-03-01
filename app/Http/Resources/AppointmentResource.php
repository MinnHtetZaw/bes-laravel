<?php

namespace App\Http\Resources;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
        // $doctor = Doctor::find($this->doctor_id);
        $employee = Employee::find($this->doctor_id);
        return [
            'id'=>$this->id,
            'patient_id'=>$this->patient_id,
            'patient_name'=>$patient->name,
            'doctor_id'=>$this->doctor_id,
            'doctor_name'=>$employee->name,
            'date'=>$this->date,
            'start'=>$this->start,
            'end'=>$this->end,
            'description'=>$this->description,
        ];
    }
}
