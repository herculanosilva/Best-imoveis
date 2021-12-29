<?php

namespace App\Listeners;

use App\Models\LogAccess;
use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogFailedLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $email = request()->get('email');
        LogAccess::create([
            'action' => "Failed",
            'description' => "O e-mail:" . $email . " tentou acessar o sistema."
        ]);
    }

    /**
     * Handle the event.
     *
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        //
    }
}
