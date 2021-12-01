<?php

namespace App\Exports;

use App\Models\Immobile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ImmobilesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Immobile::with(['proximity','type','finality','address','city'])->get();
        $teste = Immobile::with(['proximity','type','finality','address','city'])->get();
        dd($teste);

    }

    public function headings():array{
        return [
            'ID',
            'Titulo',
            'Terreno m²',
            'Sala',
            'Banheiro',
            'Dormitórios',
            'Garagem',
            'Descrição',
            'Preço',
            'Cidade',
            'Rua',
            'Numero',
            'Bairro',
            'Complemento',
            'Endereço',
            'Tipo',
            'Finalidade',
            'Ultima atualização',
        ];
    }

    public function map($linha):array{
        // dd($linha);
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
