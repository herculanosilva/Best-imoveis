<?php

namespace App\Http\Controllers;

use App\Models\Immobile;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $chart = (new LarapexChart)->setTitle('Imóveis por cidade')
        // ->setDataset([150, 120])
        // ->setLabels(['Published', 'No Published']);

        // return view('home', compact('chart'));

        //grafico:
        // $chart = (new LarapexChart)->pieChart()
        //         ->setTitle('Imóveis por cidade')
        //         ->addData([
        //             $immobiles = DB::table('immobiles')
        //                         ->where([
        //                             ['tipo','=','Gerente'],
        //                             ['deleted_at','=', null],
        //                         ])
        //                         ->count(),
        //             $immobiles = DB::table('cities')
        //                         ->where([
        //                             ['tipo','=','Administrador'],
        //                             ['deleted_at','=', null],
        //                         ])
        //                         ->count()
        //         ])
        //         ->setColors(['#EFCB68','#388697','#D65780'])
        //         ->setLabels(['Gerente', 'Administrador', 'RH/DP']);

        //cards:
        $usuarios = DB::table('users')
                    ->whereNull('deleted_at')
                    ->get();
        $usuarios_qtd = $usuarios->count();


        return view('home', compact('usuarios_qtd'));

    }

}
