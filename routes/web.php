<?php

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\FinalityController;
use App\Http\Controllers\Admin\ImmobileController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\TypeController;
use Illuminate\Support\Facades\Route;

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

#SITE
// city
Route::resource('/', App\Http\Controllers\Site\CityController::class)->only('index');
//immobile
route::resource('city.immobile', App\Http\Controllers\Site\ImmobileController::class)->only(['index','show']);

//grupo admin
Route::prefix('admin')->name('admin.')->group( function(){
    //city
    Route::resource('city', CityController::class)->middleware('auth')->except(['show']);
    //type
    Route::resource('type', TypeController::class)->middleware('auth')->except(['show']);
    //finality
    Route::resource('finality', FinalityController::class)->middleware('auth')->except(['show']);
    //Immobile
    Route::resource('immobile', ImmobileController::class)->middleware('auth');
    // Photo
    #Nested Resources  immobile/1/photo/???
    Route::resource('immobile.photos', PhotoController::class)->middleware('auth')->except(['show','edit','update']);
});

require __DIR__.'/auth.php';
