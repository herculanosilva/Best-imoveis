<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    //todos os campos da table que pode ser adicionado em massa
    protected $fillable = ['name'];

    public function immobiles(){
        // relacionamento 1 - N
        return $this->hasMany(Immobile::class,'city_id');
    }
}
