<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
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
            // retornando todas as cidades
            return User::all();
        }else{
            // retornando com os parametros de pequisa
            return User::where('name','ILIKE',"%{$this->search}%")
                        ->orWhere('email','ILIKE',"%{$this->search}%")
                        ->orderBy('name', 'ASC')
                        ->get();
        }
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
