<?php

namespace App\Http\Resources;

use App\Models\Admission;
use Illuminate\Http\Resources\Json\JsonResource;

class DischargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $admission = Admission::find($this->admission_id);
        return [
            'id' => $this->id,
            'p_ID' => $this->p_ID,
            'patient_id' => $this->patient_id,
            'patient_name' => $this->patient_name,
            'approve_doctor' => $this->approve_doctor,
            'room_ID' => $this->room_ID,
            'bed_ID' => $this->bed_ID,
            'admission' => $admission,
            'date' => $this->date,
            'time' => $this->time,
        ];
    }
}
