<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    //todos os campos da table que pode ser adicionado em massa
    protected $fillable = ['name'];

    public function immobiles(){
        // relacionamento 1 - N
        return $this->hasMany(Immobile::class,'city_id');
    }
}
