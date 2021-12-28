<?php

namespace App\Observers;

use App\Models\Immobile;
use App\Models\Log;

class ImmobileObserver
{
    /**
     * Handle the Immobile "created" event.
     *
     * @param  \App\Models\Immobile  $immobile
     * @return void
     */
    public function created(Immobile $immobile)
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
            'description' => "O usuário: $user cadastrou o imovel: $immobile->name"
        ]);
    }

    /**
     * Handle the Immobile "updated" event.
     *
     * @param  \App\Models\Immobile  $immobile
     * @return void
     */
    public function updated(Immobile $immobile)
    {
        $user = auth()->user()->name;
        Log::create([
            'action' => "Atualização",
            'description' => "O usuário: $user atualizou o imovel: $immobile->name"
        ]);
    }

    /**
     * Handle the Immobile "deleted" event.
     *
     * @param  \App\Models\Immobile  $immobile
     * @return void
     */
    public function deleted(Immobile $immobile)
    {
        $user = auth()->user()->name;
        Log::create([
            'action' => "Remoção",
            'description' => "O usuário: $user removeu o imovel: $immobile->name"
        ]);
    }

    /**
     * Handle the Immobile "restored" event.
     *
     * @param  \App\Models\Immobile  $immobile
     * @return void
     */
    public function restored(Immobile $immobile)
    {
        //
    }

    /**
     * Handle the Immobile "force deleted" event.
     *
     * @param  \App\Models\Immobile  $immobile
     * @return void
     */
    public function forceDeleted(Immobile $immobile)
    {
        //
    }
}
