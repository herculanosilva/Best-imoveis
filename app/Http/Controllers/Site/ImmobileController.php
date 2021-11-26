<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Immobile;
use Illuminate\Http\Request;

class ImmobileController extends Controller
{
    public function index($IdCity){

        $city = City::find($IdCity);

        $immobiles = Immobile::with(['proximity','photo'])
                            ->where('city_id',$IdCity)
                            ->paginate(env('PAGINATION_SITE'));

        return view('site.city.immobile.index', compact('city','immobiles'));
    }
}
