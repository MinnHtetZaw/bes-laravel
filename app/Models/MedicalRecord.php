<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    protected $with = ['vital_sign','medicines','procedure_items','surgeon_services'];

    public function vital_sign(){
        return $this->hasOne(VitalSign::class);
    }

    public function medicines(){
        return $this->hasMany(MedicineItem::class);
    }

    public function procedure_items(){
        return $this->hasMany(ProcedureItem::class);
    }

    public function surgeon_services(){
        return $this->hasMany(SurgeonService::class);
    }
}
