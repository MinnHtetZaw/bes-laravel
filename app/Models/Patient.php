<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $with= ['medical_records'];

    public function medical_records(){
        return $this->hasMany(MedicalRecord::class);
    }

}
