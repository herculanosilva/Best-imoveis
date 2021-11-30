<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'street',
        'number',
        'complement',
        'district',
        'immobile_id'];

    #relacionamento Immobile (1) para (1) Address
    public function imomobile(){
        return $this->belongsTo(Immobile::class, 'immobile_id'); //endereço pertence a imovel
    }
}

