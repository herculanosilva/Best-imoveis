<?php

namespace App\Exports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CitiesExport implements FromCollection, WithHeadings, WithMapping
{
    //variável de pesquisa
    protected $search;

    // construct
    public function __construct($search)
    {
        $this->search = $search;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if( $this->search == null){
            // retornando todas as cidades
            return City::all();
        } else {
            // retornando com os parametros de pequisa
            return City::where('name','ILIKE',"%{$this->search}%")
                        ->orderBy('id', 'DESC')
                        ->get();
        }

    }

    public function headings():array{
        return [
                'ID',
                'Cidade',
                'Ultima atualização',
            ];
    }

    public function map($linha):array{
        return[
            $linha->id,
            $linha->name,
            date('H:i d/m/Y', strtotime($linha->updated_at)),
        ];
    }
}
