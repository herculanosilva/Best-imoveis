<?php

namespace App\Exports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CitiesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return City::all();
    }

    public function headings():array{
        return [
                'ID',
                'Cidade',
                'ultima atualização',
            ];
    }

    public function map($linha):array{
        return[
            $linha->id,
            $linha->name,
            date('d/m/Y', strtotime($linha->updated_at)),
        ];
    }
}
