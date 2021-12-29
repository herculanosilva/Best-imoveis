<?php

namespace App\Observers;

use App\Models\City;
use App\Models\LogAction;

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
        //recuperando os dados do usuario LogActionado
        $user = auth()->user();
        //verificando se há usuario LogActionado (estamos inserindo por seed's ?)
        if (isset($user)) {
            $user->name;
        }else{
            //caso não tenha usuario LogActionado vamos atribuir o nome administrador
            $user = 'Administrador';
        }

        LogAction::create([
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
        LogAction::create([
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
        LogAction::create([
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
