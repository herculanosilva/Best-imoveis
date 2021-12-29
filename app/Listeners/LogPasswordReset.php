<?php

namespace App\Listeners;

use App\Models\LogAccess;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogPasswordReset
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $email = request()->email;
        // $user = request()->name;
        LogAccess::create([
            'action' => "Reset",
            'description' => "O usuário do e-mail: $email atualizou a senha."
        ]);
    }

    /**
     * Handle the event.
     *
     * @param  PasswordReset  $event
     * @return void
     */
    public function handle(PasswordReset $event)
    {
        //
    }
}
