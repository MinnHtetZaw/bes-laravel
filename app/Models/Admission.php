<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $with = ['hospital_bills'];
    public function hospital_bills(){
        return $this->hasMany(HospitalBill::class);
    }
}
