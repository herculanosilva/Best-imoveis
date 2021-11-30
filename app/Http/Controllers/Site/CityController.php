<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){

        $cities = City::orderBy('name')->get();

        return view('site.city.index', compact('cities'));
    }
}
