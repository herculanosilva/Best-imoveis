<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Immobile;
use App\Models\Finality;
use App\Models\City;
use App\Models\Type;
use App\Models\LogAction;
use App\Models\LogAccess;

class UsefulController extends Controller
{
    // Buscando usuarios
    public function ExportUser($search){
        if ($search == null){
            return User::all();
        }else{
            return User::where('name','ILIKE', "%{$search}%")
                ->orWhere('email','ILIKE', "%{$search}%")
                ->get();
        }
    }

    // Buscando tipos
    public function ExportType($search){
        if ($search == null){
            return Type::all();
        }else{
            return Type::where('name','ILIKE', "%{$search}%")
                ->get();
        }
    }

    // Buscando imoveis
    public function ExportImmobile($search){
        if ($search == null){
            return Immobile::with(['proximity','type','finality','address','city'])->get();
        }else{
            dd('to aqui no else');
            return Immobile::where('city_id','=',"$search")
                       ->orWhere('title','ILIKE', "%{$search}%")
                       ->with(['proximity','type','finality','address','city'])
                       ->get();
        }
    }

    // Buscando finalidades
    public function ExportFinality($search){
        if ($search == null){
            return Finality::all();
        }else{
            return Finality::where('name','ILIKE', "%{$search}%")
                ->get();
        }
    }

    // Buscando cidades
    public function ExportCity($search){
        if ($search == null){
            return City::all();
        }else{
            return City::where('name','ILIKE', "%{$search}%")
                ->get();
        }
    }

    // Buscando logs de ações
    public function ExportActionLog($search){

    }

    // Buscando logs de acessos
    public function ExportAccessLog($search){

    }
}
