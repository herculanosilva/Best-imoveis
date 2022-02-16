<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ImmobilesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImmobileStoreRequest;
use App\Http\Requests\ImmobileUpdateRequest;
use App\Models\Address;
use App\Models\City;
use App\Models\Finality;
use App\Models\Immobile;
use App\Models\Proximity;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class ImmobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   #Eager Loading
        //$immobiles = Immobile::all();

        #Lazy Loading
        // $immobiles = Immobile::with(['city','address'])
        //                 ->orderBy('title','asc')
        //                 ->get();

        #join - para ordenar por dado de uma tabela relacionada
        $immobiles = Immobile::join('cities','cities.id','=','immobiles.city_id')
                            ->join('addresses','addresses.immobile_id','=','immobiles.id')
                            ->orderBy('cities.name','asc')
                            ->orderBy('addresses.district','asc')
                            ->orderBy('title','asc');

        $city_id = $request->city_id;
        $title = $request->title;

        //Filtro de cidade
        if($request->city_id){
            $immobiles->where('city_id', $city_id);
        }
        //Filtro de title
        if($request->title){
            $immobiles->where('title','like',"%$title%");
        }
        // filtro
        $filters = $request->except('_token');

        // pegando os dados retornados a parti da execução da query | withQueryString tudo que ja estava no link vai ser mantido
        $immobiles = $immobiles->paginate(env('PAGINATION'))->withQueryString();

        $cities = City::orderBy('name')->get();

        return view('admin.immobile.index', compact('immobiles','cities','title','city_id','filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $typies = Type::all();
        $finalities = Finality::all();
        $proximities = Proximity::all();

        $action = route('admin.immobile.store');
        return view('admin.immobile.form', compact('action', 'cities', 'typies','finalities','proximities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImmobileStoreRequest $request)
    {
        DB::beginTransaction();
            $immobile = Immobile::create($request->all());
            //create usa o metodo do relacionamento address()
            $immobile->address()->create($request->all());

            if($request->has('proximity')){
                //relacionamento N - N
                $immobile->proximity()->sync($request->proximity);
            }
        DB::commit();

        $request->session()->flash('sucesso',"imovel foi incluido com sucesso!");
        return redirect()->route('admin.immobile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //indo o bd e pegando os dados relacionados ao imovel. Eager Loading
        $immobile = Immobile::with(['city','address','finality','type','proximity'])->find($id);
        return view('admin.immobile.show', compact('immobile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //indo o bd e pegando os dados relacionados ao imovel. Eager Loading
        $immobile = Immobile::with(['city','address','finality','type','proximity'])->find($id);

        $cities = City::all();
        $typies = Type::all();
        $finalities = Finality::all();
        $proximities = Proximity::all();

        $action = route('admin.immobile.update', $immobile->id);

        return view('admin.immobile.form', compact('cities','typies','finalities','proximities','action','immobile'));
    }

    /**
     * district the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImmobileUpdateRequest $request, $id)
    {
        $immobile = Immobile::find($id);

        DB::beginTransaction();
        $immobile->update($request->all());
        //update usa o address retornando o valor, pois há dados associado
        $immobile->address->update($request->all());

        if($request->has('proximity')){
            //relacionamento N - N
            $immobile->proximity()->sync($request->proximity);
        }
        DB::commit();

        $request->session()->flash('sucesso',"imovel foi atualizado com sucesso!");
        return redirect()->route('admin.immobile.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();
        $immobile = Immobile::find($id);
        //removendo o endereço | busca o endereço associado ao imovel e remove
        $immobile->address->delete();
        //removendo o imovel | objeto que representa o imovel
        $immobile->delete();
        DB::commit();

        $request->session()->flash('sucesso',"Imovel incluído com sucesso!");
        return redirect()->route('admin.immobile.index');
    }

    // public function export(Request $request){
    //     return Excel::download(new ImmobilesExport($request->city_id, $request->title), 'Imoveis.xlsx');
    // }

    // public function exporttopdf()
    // {
    //     $immobiles = Immobile::with(['proximity','type','finality','address','city'])->get();

    //     $pdf = PDF::loadView('admin.immobile.pdf', ['immobiles' => $immobiles]);
    //     $pdf->setPaper('a4', 'landscape');
    //     return $pdf->download('Imoveis.pdf');
    // }

}
