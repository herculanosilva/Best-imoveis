<?php

namespace App\Observers;

use App\Models\City;
use App\Models\Log;
use Illuminate\Http\Request;

class CityObserver
{
    /**
     * Handle the City "created" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function created(City $city)
    {
        //recuperando os dados do usuario logado
        $user = auth()->user();
        //verificando se há usuario logado (estamos inserindo por seed's ?)
        if (isset($user)) {
            $user->name;
        }else{
            //caso não tenha usuario logado vamos atribuir o nome administrador
            $user = 'Administrador';
        }

        Log::create([
            'action' => "Cadastro",
            'description' => "O usuário: $user cadastrou a cidade: $city->name"
        ]);
    }

    /**
     * Handle the City "updated" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function updated(City $city)
    {
        $user = auth()->user()->name;
        Log::create([
            'action' => "Atualização",
            'description' => "O usuário: $user atualizou a cidade: $city->name"
        ]);
    }

    /**
     * Handle the City "deleted" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function deleted(City $city)
    {
        $user = auth()->user()->name;
        Log::create([
            'action' => "Remoção",
            'description' => "O usuário: $user removeu a cidade: $city->name"
        ]);
    }

    /**
     * Handle the City "restored" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function restored(City $city)
    {
        //
    }

    /**
     * Handle the City "force deleted" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function forceDeleted(City $city)
    {
        //
    }
}
