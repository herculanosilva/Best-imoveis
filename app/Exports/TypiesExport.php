<?php

namespace App\Exports;

use App\Models\Type;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TypiesExport implements FromCollection, WithHeadings, WithMapping
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
            return Type::all();
        } else {
            // retornando com os parametros de pequisa
            return Type::where('name','ILIKE',"%{$this->search}%")
                        ->orderBy('name', 'ASC')
                        ->get();
        }

    }

    public function headings():array{
        return [
                'ID',
                'Tipo de imovel',
                'Ultima atualização',
        ];
    }

    public function map($linha):array{
        return
        [
            $linha->id,
            $linha->name,
            date('H:i d/m/Y', strtotime($linha->updated_at)),
        ];
    }
}
