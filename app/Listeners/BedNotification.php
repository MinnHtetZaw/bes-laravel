<?php

namespace App\Listeners;

use App\Events\BedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BedNotification
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
     * @param  \App\Events\BedEvent  $event
     * @return void
     */
    public function handle(BedEvent $event)
    {
        //
    }
}
