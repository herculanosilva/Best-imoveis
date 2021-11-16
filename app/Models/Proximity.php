<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proximity extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //N para N
    public function immobile(){
        return $this->belongsToMany(immobile::class, 'immobile_proximity','proximity_id','immobile_id')->withTimestamps();
    }
}
