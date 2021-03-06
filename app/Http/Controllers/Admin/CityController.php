<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CitiesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //listando todas as cidades
        $cities = City::orderBy('name', 'asc');
        //verificando se ha pesquisa
        if($request->search){
            //substitui todas as ocorrencias da string de procura com a string de substituição
            $request->search = str_replace(['.','-','/'],'', $request->search);
            $cities->where('name','ILIKE', "%{$request->search}%")->get();
        }
        $cities = $cities->paginate(env('PAGINATION'))->withQueryString();
        // retornando o conteudo da pequisa para preencher o input
        $search = $request->search;

        return view('admin.city.index', compact('cities','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Mostra o formulário
        $action = route('admin.city.store');
        return view('admin.city.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request)
    {
        //Salva efetivamente os dados
        city::create($request->all());
        //guardando dados na sessão de forma de flash
        $request->session()->flash('sucesso',"Cidade $request->name foi incluida com sucesso!");
        return redirect()->route('admin.city.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        $action = route('admin.city.update', $city->id);
        return view('admin.city.form', compact('city','action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityUpdateRequest $request, $id)
    {
        $city = City::find($id);
        $city->update($request->all());
        $city->save();

        $request->session()->flash('sucesso',"Cidade $request->name foi editado com sucesso!");
        return redirect()->route('admin.city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        City::destroy($id);
        $request->session()->flash('sucesso',"Cidade excluida com sucesso!");
        return redirect()->route('admin.city.index');
    }

    // public function export(Request $request)
    // {
    //     return Excel::download(new CitiesExport($request->search), 'Cidades.xlsx');
    // }

    // public function exporttopdf()
    // {
    //     $cities = City::all();
    //     $pdf = PDF::loadView('admin.city.pdf', ['cities' => $cities]);
    //     return $pdf->download('Cidades.pdf');
    // }
}
