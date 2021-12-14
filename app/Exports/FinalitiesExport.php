<?php

namespace App\Exports;

use App\Models\Finality;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FinalitiesExport implements FromCollection, WithHeadings, WithMapping
{
    //variável de pesquisa
    protected $search;

    public function __construct($search)
    {
        $this->search = $search;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->search == null){
            // retornando todas as finalidades
            return Finality::all();
        }else{
            return Finality::where('name','ILIKE',"%{$this->search}%")
                        ->orderBy('name', 'ASC')
                        ->get();
        }
    }

    public function headings():array{
        return [
            'ID',
            'Finalidade do imóvel',
            'Ultima atualização',
        ];
    }

    public function map($linha):array{
        return [
            $linha->id,
            $linha->name,
            date('H:i d/m/Y', strtotime($linha->updated_at)),

        ];
    }
}
