<?php

namespace App\Http\Resources;

use App\Models\Bed;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Http\Resources\Json\JsonResource;

class AdmissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $bed = Bed::find($this->bed_id);
        $room = Room::where('id',$bed->room_id)->first();
        $patient = Patient::find($this->patient_id);
        $doctor = Doctor::find($this->doctor_id);
        if ($this->status == 0) {
            $status_name = 'In Hospital';
        }elseif ($this->status == 1) {
            $status_name = 'Discharge';
        }
        return [
            'id'=>$this->id,
            'date'=>$this->date,
            'time'=>$this->time,
            'bed_id'=>$this->bed_id,
            'bed_name'=>$bed->name,
            'status_name'=>$status_name,
            'room_id'=>$room->id,
            'room_name'=>$room->name,
            'price_per_day'=>$room->price_per_day,
            'patient_id'=>$this->patient_id,
            'doctor_id'=>$this->doctor_id,
            'doctor_name'=>$doctor->name ??'doctor',
            'patient_name'=>$patient->name,
            'patient_ID'=>$patient->patient_id,
            'hospital_bills'=> HospitalBillResource::collection($this->hospital_bills),
            'hospital_charges'=>$this->hospital_charges,
            'medicine_charges'=>$this->medicine_charges,
            'service_charges'=>$this->service_charges,
            'laboratory_charges'=>$this->laboratory_charges,
            'radiology_charges'=>$this->radiology_charges,
            'total_charges'=>$this->total_charges,
        ];
    }
}
