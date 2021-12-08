<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Finality;
use App\Models\Immobile;
use App\Models\Type;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

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
        // $chart = (new LarapexChart)->setTitle('Imóveis por city')
        // ->setDataset([150, 120])
        // ->setLabels(['Published', 'No Published']);

        // return view('home', compact('chart'));

        //grafico:
        // $chart = (new LarapexChart)->pieChart()
        //         ->setTitle('Imóveis por city')
        //         ->addData([
        //             $immobiles = DB::table('immobiles')
        //                         ->where([
        //                             ['type','=','Gerente'],
        //                             ['deleted_at','=', null],
        //                         ])
        //                         ->count(),
        //             $immobiles = DB::table('cities')
        //                         ->where([
        //                             ['type','=','Administrador'],
        //                             ['deleted_at','=', null],
        //                         ])
        //                         ->count()
        //         ])
        //         ->setColors(['#EFCB68','#388697','#D65780'])
        //         ->setLabels(['Gerente', 'Administrador', 'RH/DP']);

        //cards:

        $qtd_cities = City::count();

        $qtd_typies = Type::count();

        $qtd_finalities = Finality::count();

        $qtd_users = User::count();


        $cities = City::all();
        $count_array = array();
        $nome_array = array();

        foreach ($cities as $city){
            $count = DB::table('immobiles')
                        ->where('immobiles.city_id',$city->id)
                        ->count();
            if($count != null){ //!=0 && $count >0 && $count != null
                array_push($count_array,$count);
                array_push($nome_array,$city->name);
            }
        }

        $pieChart = (new LarapexChart)
                ->pieChart()
                ->setTitle('Imoveis por cidade')
                ->setDataset($count_array)
                ->setLabels($nome_array);

        return view('home', compact('qtd_cities','qtd_typies','qtd_finalities','qtd_users','pieChart'));

    }

}
