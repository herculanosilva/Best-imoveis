<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CidadeController extends Controller
{
    public function cidades(){

        $caption = 'Lista de Cidades';
        // $cidades = ['Floresta PE','Belém PE','Petrolândia','Serra Talhada'];
        $cities = City::all();
        // dd($cities);
        return view('admin.cidade.index',compact('caption','cities'));
    }

    public function formAdicionar(){
        return view('admin.cidade.form');

    }

    public function adicionar(Request $request){
        //criar um objeto do modelo da class Cidade
        $city = new City();
        $city->name = $request->name;

        //salvando no bd
        $city->save();

        return redirect()->route('admin.cidades.listar');
    }
}
