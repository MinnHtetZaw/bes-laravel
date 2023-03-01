<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VitalSignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'medical_record_id' => $this->o_p_d_medical_record_id,
            't'=>$this->t,
            'bp'=>$this->bp,
            'spo2'=>$this->spo2,
            'b_w'=>$this->b_w,
            'pr'=>$this->pr,
            'hr'=>$this->hr,
            'rr'=>$this->rr,
            'complaint'=>$this->complaint,
            'physical_examination'=>$this->physical_examination,
            'procedure'=>$this->procedure,
            'diagnosis'=>$this->diagnosis,
            'next_appointment_date'=>$this->next_appointment_date,
            'ot_room'=>$this->ot_room,
        ];
    }
}
