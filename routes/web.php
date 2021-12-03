<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\FinalityController;
use App\Http\Controllers\Admin\ImmobileController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\TypeController;

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
Auth::routes([ 'verify' => true ]);

// redirect route /login user will not reset password
Route::redirect('/password/reset','/login');

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
<<<<<<< Updated upstream
    Route::resource('immobile.photos', PhotoController::class)->except(['show','edit','update']);
=======
    Route::resource('immobile.photos', PhotoController::class)->except(['show','edit','update'])->middleware('verified');
    //user
    Route::resource('user', UserController::class)->except(['show'])->middleware('verified');
>>>>>>> Stashed changes

        #Export excel
        //city
        Route::get('cities/export/', 'App\Http\Controllers\Admin\CityController@export')->name('cities.xlsx');
        //type
        Route::get('typies/export/', 'App\Http\Controllers\Admin\TypeController@export')->name('typies.xlsx');
        //finality
        Route::get('finalities/export/', 'App\Http\Controllers\Admin\FinalityController@export')->name('finalities.xlsx');
        //immobile
        Route::get('immobiles/export/', 'App\Http\Controllers\Admin\ImmobileController@export')->name('immobiles.xlsx');

        #Export PDF
        //city
        Route::get('cities/exporttopdf/', 'App\Http\Controllers\Admin\CityController@exporttopdf')->name('cities.pdf');
        //type
        Route::get('typies/exporttopdf/', 'App\Http\Controllers\Admin\TypeController@exporttopdf')->name('typies.pdf');
        //finality
        Route::get('finalities/exporttopdf/', 'App\Http\Controllers\Admin\FinalityController@exporttopdf')->name('finalities.pdf');
        //immobile
        Route::get('immobiles/exporttopdf/', 'App\Http\Controllers\Admin\ImmobileController@exporttopdf')->name('immobiles.pdf');

});

// Site
    route::resource('/', App\Http\Controllers\Site\CityController::class)->only('index');
    route::resource('city.immobile', App\Http\Controllers\Site\ImmobileController::class)->only(['index','show']);
<<<<<<< Updated upstream



// //Exports exemple
// Route::get('company/exporttopdf/{search?}','App\Http\Controllers\ExpotsController@CompanyPDF')
//     ->name('company.exporttopdf')->where('search', '.*');
// Route::get('company/exporttoexcel/{search?}','App\Http\Controllers\ExpotsController@CompanySpreadsheet')
//     ->name('company.exporttoexcel')->where('search', '.*');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
>>>>>>> Stashed changes
