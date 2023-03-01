<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;
    protected $with = ['rooms','beds'];
    public function rooms(){
        return $this->hasMany(Room::class);
    }
    public function beds(){
        return $this->hasManyThrough(Bed::class,Room::class);
    }
}
