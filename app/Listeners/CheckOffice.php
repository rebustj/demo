<?php

namespace App\Listeners;

use App\Events\FormMounted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CheckOffice
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
     * @param  \App\Events\FormMounted  $event
     * @return void
     */
    public function handle(FormMounted $event)
    {
        //
    }
}
