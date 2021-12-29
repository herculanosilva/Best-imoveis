<?php

namespace App\Listeners;

use App\Models\LogAccess;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $user = auth()->user()->name;
        LogAccess::create([
            'action' => "Logout",
            'description' => "O usuário: $user, fez logout no sistema."
        ]);
    }

    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        //
    }
}
