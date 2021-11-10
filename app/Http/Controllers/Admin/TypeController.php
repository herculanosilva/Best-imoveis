<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeStoreRequest;
use App\Http\Requests\TypeUpdateRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.type.index', compact('types'));
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
}
