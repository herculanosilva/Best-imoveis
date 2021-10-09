<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CidadeController extends Controller
{
    public function cidades(){

        $subtitulo = 'Lista de Cidades';
        // $cidades = ['Floresta PE','Belém PE','Petrolândia','Serra Talhada'];
        $cities = City::all();
        // dd($cities);
        return view('admin.cidade.index',compact('subtitulo','cities'));
    }
}
