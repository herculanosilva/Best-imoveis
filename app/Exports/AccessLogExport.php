<?php

namespace App\Exports;

use App\Models\LogAccess;
use Illuminate\Auth\Events\Login;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AccessLogExport implements FromCollection, WithHeadings, WithMapping
{
    //variavel de pesquisa
    protected $search;

    //construct
    public function __construct($search){
        $this->search = $search;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->search == null){
            // retornando todos os logs
            return LogAccess::all();
        }else{
            return LogAccess::where('action','ILIKE',"%{$this->search}%")
                            ->orWhere('description','ILIKE',"%{$this->search}%")
                            ->orderBy('id','DESC')
                            ->get();
        }
    }
    public function headings():array{
        return[
            'ID',
            'Ação',
            'Descrição',
            'Data do registro',
        ];
    }

    public function map($linha):array{
        return[
            $linha->id,
            $linha->action,
            $linha->description,
            date('H:i d/m/Y', strtotime($linha->updated_at)),
        ];
    }
}
