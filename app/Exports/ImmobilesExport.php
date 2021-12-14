<?php

namespace App\Exports;

use App\Models\Immobile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ImmobilesExport implements FromCollection, WithHeadings, WithMapping
{
    //variável de pesquisa
    protected $city_id;
    protected $title;

    public function __construct($city_id, $title)
    {
        $this->city_id = $city_id;
        $this->search = $title;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->city_id == null && $this->title == null){
            // retornando todas as finalidades
            return Immobile::with(['proximity','type','finality','address','city'])
                            ->get();
        }else{
            return Immobile::where('title','ILIKE',"%{$this->search}%")
                            ->orWhere('city_id', $this->city_id)
                            ->with(['proximity','type','finality','address','city'])
                            ->get();
        }

    }

    public function headings():array{
        return [
            'ID',
            'Título',
            'Terreno M²',
            'Nº Salas',
            'Nº Banheiro',
            'Nº Dormitórios',
            'Nº Garagem',
            'Descrição',
            'Preço',
            'Cidade',
            'Rua',
            'Numero',
            'Bairro',
            'Complemento',
            'Tipo',
            'Finalidade',
            'Ultima atualização',
        ];
    }

    public function map($linha):array{
        return [
            $linha->id,
            $linha->title,
            $linha->ground,
            $linha->living_room,
            $linha->bathroom,
            $linha->room,
            $linha->garage,
            $linha->description,
            $linha->price,
            $linha->city->name,
            $linha->address->street,
            $linha->address->number,
            $linha->address->district,
            $linha->address->complement,
            $linha->type->name,
            $linha->finality->name,
            date('H:i d/m/Y', strtotime($linha->updated_at)),
        ];
    }
}
