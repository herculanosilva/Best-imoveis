<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TypiesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeStoreRequest;
use App\Http\Requests\TypeUpdateRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // listando todas os tipos de imoveis
        $types = Type::orderBy('name', 'asc');
        //verificando se ha pesquisa
        if($request->search){
            //substitui todas as ocorrencias da string de procura com a string de substituição
            $request->search = str_replace(['.','-','/'],'', $request->search);
            $types->where('name','ILIKE', "%{$request->search}%")->get();
        }
        $types = $types->paginate(env('PAGINATION'))->withQueryString();
        // retornando o conteudo da pequisa para preencher o input
        $search = $request->search;

        return view('admin.type.index', compact('types','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.type.store');
        return view('admin.type.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeStoreRequest $request)
    {
        Type::create($request->all());
        $request->session()->flash('sucesso',"O tipo $request->name foi incluido com sucesso!");
        return redirect()->route('admin.type.index');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::find($id);
        $action = route('admin.type.update', $type->id);
        return view('admin.type.form', compact('type','action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeUpdateRequest $request, $id)
    {
        $type = Type::find($id);
        $type->update($request->all());
        $type->save();

        $request->session()->flash('sucesso', "O tipo $request->name foi editado com sucesso!");
        return redirect()->route('admin.type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Type::destroy($id);
        $request->session()->flash('sucesso', "Tipo de imovel excluido com sucesso!");
        return redirect()->route('admin.type.index');
    }

    public function export(){
        return Excel::download(new TypiesExport, 'Tipo.xlsx');
    }

    public function exporttopdf()
    {
        $typies = Type::all();
        $pdf = PDF::loadView('admin.type.pdf', ['typies' => $typies]);
        return $pdf->download('Tipos.pdf');
    }
}
