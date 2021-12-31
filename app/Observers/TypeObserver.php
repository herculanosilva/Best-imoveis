<?php

namespace App\Observers;

use App\Models\LogAction;
use App\Models\Type;

class TypeObserver
{
    /**
     * Handle the Type "created" event.
     *
     * @param  \App\Models\Type  $type
     * @return void
     */
    public function created(Type $type)
    {
        //recuperando os dados do usuario logado
        $user = auth()->user();
        //verificando se há usuario logado (estamos inserindo por seed's ?)
        if (isset($user)) {
            $user = $user->name;
        }else{
            //caso não tenha usuario logado vamos atribuir o nome administrador
            $user = 'Administrador';
        }

        LogAction::create([
            'action' => "Cadastro",
            'description' => "O usuário: $user cadastrou o tipo: $type->name"
        ]);
    }

    /**
     * Handle the Type "updated" event.
     *
     * @param  \App\Models\Type  $type
     * @return void
     */
    public function updated(Type $type)
    {
        $user = auth()->user();
        LogAction::create([
            'action' => "Atualização",
            'description' => "O usuário: $user atualizou o tipo: $type->name"
        ]);
    }

    /**
     * Handle the Type "deleted" event.
     *
     * @param  \App\Models\Type  $type
     * @return void
     */
    public function deleted(Type $type)
    {
        $user = auth()->user()->name;
        LogAction::create([
            'action' => "Remoção",
            'description' => "O usuário: $user removeu o tipo: $type->name"
        ]);
    }

    /**
     * Handle the Type "restored" event.
     *
     * @param  \App\Models\Type  $type
     * @return void
     */
    public function restored(Type $type)
    {
        //
    }

    /**
     * Handle the Type "force deleted" event.
     *
     * @param  \App\Models\Type  $type
     * @return void
     */
    public function forceDeleted(Type $type)
    {
        //
    }
}
