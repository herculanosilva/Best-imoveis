<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function cidades(){

        $subtitulo = 'Lista de Cidades';
        $cidades = ['Floresta PE','Belém PE','Petrolândia','Serra Talhada'];
        return view('cidades',compact('subtitulo','cidades'));
    }
}
