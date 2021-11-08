<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CidadeController;
use App\Http\Controllers\Admin\CityController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// redirect
Route::redirect('/', '/admin/city');

Route::prefix('admin')->name('admin.')->group( function(){
    //except show - não vamos utilizar
    Route::resource('city', CityController::class)->except(['show']);
});
