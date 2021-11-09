<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['street', 'number', 'complement', 'district', 'immobiles_id'];

    #relacionamento Immobile (1) para (1) Address
    public function imomobile(){
        return $this->belongsTo(Immobile::class); //endereço pertence a imovel
    }
}

