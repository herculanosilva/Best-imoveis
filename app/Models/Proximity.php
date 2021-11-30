<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proximity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    //N para N
    public function immobile(){
        return $this->belongsToMany(immobile::class, 'immobile_proximitie','proximity_id','immobile_id')->withTimestamps();
    }
}
