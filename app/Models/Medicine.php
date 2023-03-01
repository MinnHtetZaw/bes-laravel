<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    public $with = ['units'];
    public function units(){
        return $this->hasMany(MedicineUnit::class,'medicine_id');
    }
}
