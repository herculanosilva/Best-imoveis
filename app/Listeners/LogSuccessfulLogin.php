<?php

namespace App\Listeners;

use App\Models\LogAccess;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
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
            'action' => "Login",
            'description' => "O usuário: $user, fez login no sistema."
        ]);
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //
    }
}
