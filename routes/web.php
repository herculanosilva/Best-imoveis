<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CidadeController;

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
Route::redirect('/', '/admin/cidades');

Route::prefix('admin')->name('admin.')->group( function(){
    Route::get('cidades', [CidadeController::class, 'cidades'])->name('cidades.listar'); //exibe
    Route::get('cidades/salvar', [CidadeController::class, 'formAdicionar'])->name('cidades.form'); //adciona
    Route::post('cidades/salvar', [CidadeController::class, 'adicionar'])->name('cidades.adicionar'); //salva
    Route::delete('cidades/{id}', [CidadeController::class, 'deletar'])->name('cidades.deletar'); //deleta
    Route::get('cidades/{id}', [CidadeController::class, 'formEditar'])->name('cidades.formEditar'); //edita
    Route::put('cidades/{id}', [CidadeController::class, 'editar'])->name('cidades.editar'); //atualiza

});
