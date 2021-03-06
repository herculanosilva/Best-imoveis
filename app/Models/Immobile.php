<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immobile extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', //titulo
        'ground', //tereno
        'price', //preço
        'room', //dormitorio
        'living_room', //sala de estar
        'bathroom', //banheiro
        'garage', //garagem
        'description', //descrição
        //chaves estrangeiras
        'city_id',
        'type_id',
        'finality_id',
    ];

    public function address(){
        //relacionamento 1 - 1
        return $this->hasOne(Address::class, 'immobile_id'); //ou 'App\Models\Address' imovel tem um endereço
    }

    public function city(){
        //relacionamento 1 - N
        return $this->belongsTo(City::class,'city_id');
    }

    public function finality(){
        //relacionamento 1 - N
        return $this->belongsTo(finality::class);
    }

    public function type(){
        //relacionamento 1 - N
        return $this->belongsTo(type::class,'type_id');
    }
    //N para N
    public function proximity(){
        //withTimestamps ao inserir um registro adiciona o timestamps (tabela pivo)
        return $this->belongsToMany(Proximity::class,'immobile_proximitie','immobile_id','proximity_id')->withTimestamps();
        //nome da tabela intermediaria (immobile_proximitie)
        // e a chave estrangeira da tabela pivot com relação ao modelo  'immobile_id'
        // e a chave estrangeira da tabela pivot com relação ao  OUTRO modelo 'proximity_id'
    }
    //1 para N
    public function photo(){
        return $this->hasMany(Photo::class);
    }
}
