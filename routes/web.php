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

// redirect
// Route::redirect('/', '/admin/immobile');

//grupo admin
Route::prefix('admin')->name('admin.')->group( function(){
    //city
    Route::resource('city', CityController::class)->except(['show']);
    //type
    Route::resource('type', TypeController::class)->except(['show']);
    //finality
    Route::resource('finality', FinalityController::class)->except(['show']);
    //Immobile
    Route::resource('immobile', ImmobileController::class);
    // Photo #Nested Resources | immobile/1/photo/???
    Route::resource('immobile.photos', PhotoController::class)->except(['show','edit','update']);

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



// //Exports exemple
// Route::get('company/exporttopdf/{search?}','App\Http\Controllers\ExpotsController@CompanyPDF')
//     ->name('company.exporttopdf')->where('search', '.*');
// Route::get('company/exporttoexcel/{search?}','App\Http\Controllers\ExpotsController@CompanySpreadsheet')
//     ->name('company.exporttoexcel')->where('search', '.*');
