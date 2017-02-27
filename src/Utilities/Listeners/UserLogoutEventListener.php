<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;

class UserLogoutEventListener
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
     * @param  Logout $event
     *
     * @return void
     */
    public function handle(Logout $event)
    {
        if ($event->user) {
            $event->user->session_log()->create([
                'ip'     => request()->ip(),
                'action' => 'logout',
            ]);
        }

    }
}
