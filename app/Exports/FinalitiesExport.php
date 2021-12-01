<?php

namespace App\Exports;

use App\Models\Finality;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FinalitiesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Finality::all();
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
            date('d/m/Y', strtotime($linha->updated_at)),

        ];
    }
}
