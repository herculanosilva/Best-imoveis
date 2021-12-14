<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\FinalityController;
use App\Http\Controllers\Admin\ImmobileController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Classe auxiliar que ajuda a gerar todas as rotas necessárias para autenticação do usuário.
// Auth::routes([ 'verify' => true ]);

//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//grupo admin
Route::prefix('admin')->name('admin.')->group( function(){
    //city
    Route::resource('city', CityController::class)->except(['show'])->middleware('verified');
    //type
    Route::resource('type', TypeController::class)->except(['show'])->middleware('verified');
    //finality
    Route::resource('finality', FinalityController::class)->except(['show'])->middleware('verified');
    //Immobile
    Route::resource('immobile', ImmobileController::class)->middleware('verified');
    // Photo #Nested Resources | immobile/1/photo/???
    Route::resource('immobile.photos', PhotoController::class)->except(['show','edit','update'])->middleware('verified');
    //user
    Route::resource('user', UserController::class)->except(['show'])->middleware('verified');

    #Export excel
        //city
        Route::get('cities/export/{search?}', 'App\Http\Controllers\Admin\CityController@export')
                ->name('cities.xlsx')
                ->where('search', '.*');
        //type
        Route::get('typies/export/{search?}', 'App\Http\Controllers\Admin\TypeController@export')
                ->name('typies.xlsx')
                ->where('search', '.*');;
        //finality
        Route::get('finalities/export/{search?}', 'App\Http\Controllers\Admin\FinalityController@export')
                ->name('finalities.xlsx')
                ->where('search', '.*');
        //immobile
        Route::get('immobiles/export/{city_id?}/{title?}', 'App\Http\Controllers\Admin\ImmobileController@export')
                ->name('immobiles.xlsx')
                ->where('search', '.*');
        //immobile
        Route::get('users/export/{search?}', 'App\Http\Controllers\Admin\UserController@export')
                ->name('users.xlsx')
                ->where('search', '.*');

        #Export PDF
        //city
        Route::get('cities/exporttopdf/', 'App\Http\Controllers\Admin\CityController@exporttopdf')->name('cities.pdf');
        //type
        Route::get('typies/exporttopdf/', 'App\Http\Controllers\Admin\TypeController@exporttopdf')->name('typies.pdf');
        //finality
        Route::get('finalities/exporttopdf/', 'App\Http\Controllers\Admin\FinalityController@exporttopdf')->name('finalities.pdf');
        //immobile
        Route::get('immobiles/exporttopdf/', 'App\Http\Controllers\Admin\ImmobileController@exporttopdf')->name('immobiles.pdf');
        //user
        Route::get('users/exporttopdf/', 'App\Http\Controllers\Admin\UserController@exporttopdf')->name('users.pdf');

});

// Site
    route::resource('/', App\Http\Controllers\Site\CityController::class)->only('index');
    route::resource('city.immobile', App\Http\Controllers\Site\ImmobileController::class)->only(['index','show']);

Auth::routes();
