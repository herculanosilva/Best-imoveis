<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proximity extends Model
{
    use HasFactory;

    //N para N
    public function immobile(){
        return $this->belongsToMany(immobile::class)->withTimestamps();
    }
}
