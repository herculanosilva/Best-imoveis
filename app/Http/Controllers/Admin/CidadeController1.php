<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CidadeRequest;
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

        $action = route('admin.cidades.adicionar');
        return view('admin.cidade.form', compact('action'));

    }

    public function adicionar(CidadeRequest $request){
        //criar um objeto do modelo da class Cidade
            // $city = new City();
            // $city->name = $request->name;
        //salvando no bd
            // $city->save();

        //Pegando todos os dados enviado na requisição e atribuindo para todos os campos permitidos no fillable (model)
        City::create(
            $request->all()
        );

        //guardando dados na sessão de forma de flash
        $request->session()->flash('sucesso',"Cidade $request->name incluida com sucesso!");

        return redirect()->route('admin.cidades.listar');

    }

    public function deletar($id, Request $request){
        //Modelo
        City::destroy($id);

        //guardando dados na sessão de forma de flash
        $request->session()->flash('sucesso',"Cidade excluida com sucesso!");

        return redirect()->route('admin.cidades.listar');
    }

    public function formEditar($id){

        $city = City::find($id);
        $action = route('admin.cidades.editar', $city->id);
        return view('admin.cidade.form', compact('city','action'));
    }

    public function editar(CidadeRequest $request, $id){
        $city = City::find($id);
        $city->update($request->all());
        $city->save();

        $request->session()->flash('sucesso',"Cidade $request->name editado com sucesso!");
        return redirect()->route('admin.cidades.listar');

    }
}
