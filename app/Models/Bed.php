<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;
    protected $with = ['admission'];
    public function admission(){
        return $this->hasOne(Admission::class);
    }
}
