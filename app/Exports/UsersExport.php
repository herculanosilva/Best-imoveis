<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function headings():array{
        return[
            'ID',
            'Nome',
            'Email',
            'Ultima atualização',
        ];
    }

    public function map($linha):array{
        return[
            $linha->id,
            $linha->name,
            $linha->email,
            date('H:i:s d/m/Y', strtotime($linha->updated_at))
        ];
    }
}
