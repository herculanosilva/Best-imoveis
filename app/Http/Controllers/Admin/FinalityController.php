<?php

namespace App\Http\Controllers\Admin;

use App\Exports\FinalitiesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\FinalityStoreRequest;
use App\Http\Requests\FinalityUpdateRequest;
use App\Models\Finality;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class FinalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finalities = Finality::orderBy('name', 'asc');
        $finalities = $finalities->paginate(env('PAGINATION'))->withQueryString();
        return view('admin.finality.index', compact('finalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.finality.store');
        return view('admin.type.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinalityStoreRequest $request)
    {
        Finality::create($request->all());
        $request->session()->flash('sucesso',"A finalidade $request->name foi incluida com sucesso!");
        return redirect()->route('admin.finality.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finality = Finality::find($id);
        $action = route('admin.finality.update', $finality->id);
        return view('admin.finality.form', compact('finality','action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FinalityUpdateRequest $request, $id)
    {
        $finality = Finality::find($id);
        $finality->update($request->all());
        $finality->save();

        $request->session()->flash('sucesso',"A finalidade $request->name foi editada com sucesso!");
        return redirect()->route('admin.finality.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Finality::destroy($id);
        $request->session()->flash('sucesso','A finalidade de imovel excluido com sucesso!');
        return redirect()->route('admin.finality.index');
    }

    public function export(){
        return Excel::download(new FinalitiesExport, 'Finalidade.xlsx');
    }

    public function exporttopdf()
    {
        $finalities = Finality::all();
        $pdf = PDF::loadView('admin.finality.pdf', ['finalities' => $finalities]);
        return $pdf->download('Finalidades.pdf');
    }
}
