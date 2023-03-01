<?php

namespace App\Http\Resources;

use App\Models\Patient;
use App\Models\Room;
use Illuminate\Http\Resources\Json\JsonResource;

class BedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $room = Room::find($this->room_id);
        if($this->status == 0){
            $status = 'Available';
        }else if($this->status == 1){
            $status = 'Occupied';
        }
        if (is_null($this->patient_id)){
            $patient_id = '';
            $patient = '';
        }else{
            $patient = Patient::find($this->patient_id);
            $patient_id = $patient->patient_id;
        }
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'status'=>$status,
            'status_int'=>$this->status,
            'room_id'=>$this->room_id,
            'room' => $room,
            'patient_id' => $this->patient_id,
            'patient_ID'=>$patient_id,
            'patient'=>$patient,
            'admission'=>$this->admission,
        ];
    }
}
