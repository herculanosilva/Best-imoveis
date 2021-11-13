<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\FinalityController;
use App\Http\Controllers\Admin\ImmobileController;
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
Route::redirect('/', '/admin/immobile');
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
});
