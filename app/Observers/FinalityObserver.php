<?php

namespace App\Observers;

use App\Models\Finality;
use App\Models\Log;

class FinalityObserver
{
    /**
     * Handle the Finality "created" event.
     *
     * @param  \App\Models\Finality  $finality
     * @return void
     */
    public function created(Finality $finality)
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
            'description' => "O usuário: $user cadastrou a finalidade: $finality->name"
        ]);
    }

    /**
     * Handle the Finality "updated" event.
     *
     * @param  \App\Models\Finality  $finality
     * @return void
     */
    public function updated(Finality $finality)
    {
        $user = auth()->user();
        Log::create([
            'action' => "Atualização",
            'description' => "O usuário: $user atualizou a finalidade: $finality->name"
        ]);
    }

    /**
     * Handle the Finality "deleted" event.
     *
     * @param  \App\Models\Finality  $finality
     * @return void
     */
    public function deleted(Finality $finality)
    {
        $user = auth()->user()->name;
        Log::create([
            'action' => "Remoção",
            'description' => "O usuário: $user removeu a finalidade: $finality->name"
        ]);
    }

    /**
     * Handle the Finality "restored" event.
     *
     * @param  \App\Models\Finality  $finality
     * @return void
     */
    public function restored(Finality $finality)
    {
        //
    }

    /**
     * Handle the Finality "force deleted" event.
     *
     * @param  \App\Models\Finality  $finality
     * @return void
     */
    public function forceDeleted(Finality $finality)
    {
        //
    }
}
