<?php

namespace App\Http\Resources;

use App\Models\Doctor;
use App\Models\MedicineItem;
use App\Models\Patient;
use App\Models\ProcedureItem;
use App\Models\SurgeonService;
use App\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;
use PhpParser\Comment\Doc;

class MedicalRecordResource extends JsonResource
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

        $medicine = MedicineItem::where('medical_record_id',$this->id)->get();
        $medicine_price = $medicine->pluck('sub_total');
        $medicine_total = $medicine_price->reduce(function ($carry, $item) {
            return $carry + $item;
        });

        $procedure = ProcedureItem::where('medical_record_id',$this->id)->get();
        $procedure_price = $procedure->pluck('sub_total');
        $procedure_total = $procedure_price->reduce(function($carry,$item){
            return $carry + $item;
        });

        $surgeon = SurgeonService::where('medical_record_id',$this->id)->get();
        $surgeon_charges = $surgeon->pluck('charges');
        $doctor_total = $surgeon_charges->reduce(function($carry,$item){
            return $carry + $item;
        });
        $total_bill = $medicine_total + $procedure_total + $doctor_total;
        return [
            'id'=>$this->id,
            'date'=>$this->date,
            'patient_id'=>$this->patient_id,
            'patient_name'=>$patient->name,
            'patient_ID'=>$patient->patient_id,
            'doctor_id'=>$this->doctor_id,
            'doctor_name'=>$doctor->name,
            'medicine_total' => $medicine_total,//medicine တန်ဖိုးစုစုပေါင်း
            'procedure_total' => $procedure_total,
            'doctor_total' => $doctor_total,
            'total_bill' => $total_bill,
            'vital_sign'=>$this->vital_sign,
            'medicines'=>MedicineItemResource::collection($this->medicines),
        ];
    }
}
