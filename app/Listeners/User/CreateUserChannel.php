<?php

namespace App\Listeners\User;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateUserChannel
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        /**
         * Handle the user creation event to generate automatically a channel for the user
         */
        $event->user->channel()->create([
            'name' => $event->user->name,
        ]);
    }
}
