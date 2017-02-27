<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class UserLoginEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login $event
     *
     * @return void
     */
    public function handle(Login $event)
    {
        $event->user->session_log()->create([
            'ip'     => request()->ip(),
            'action' => 'login',
        ]);
    }
}
