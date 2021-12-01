<?php

namespace App\Exports;

use App\Models\Type;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TypiesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Type::all();
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
