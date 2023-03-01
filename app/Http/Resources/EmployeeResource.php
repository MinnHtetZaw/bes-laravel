<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->gender == 0){
            $gender = 'Male';
        }elseif($this->gender == 1){
            $gender = 'Female';
        }
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'age'=>$this->age,
            'gender'=> $gender,
            'date_of_birth'=>$this->date_of_birth,
            'title'=>$this->title,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'position'=>$this->position,
            'specialization'=>$this->specialization,
            'department'=>$this->department,
            'address'=>$this->address,
            'description'=>$this->description,
        ];
    }
}
