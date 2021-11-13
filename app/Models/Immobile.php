<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immobile extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'ground',
        'living_room',
        'bathroom',
        'room',
        'garage',
        'description',
        'price',
        'city_id',
        'type_id',
        'finality_id',
    ];

    public function address(){
        return $this->hasOne(Address::class, 'immobiles_id'); //ou 'App\Models\Address' imovel tem um endereço
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function finality(){
        return $this->belongsTo(finality::class);
    }

    public function type(){
        return $this->belongsTo(type::class);
    }
    //N para N
    public function proximity(){
        //withTimestamps ao inserir um registro adiciona o timestamps (tabela pivo)
        return $this->belongsToMany(Proximity::class)->withTimestamps();
    }
}
