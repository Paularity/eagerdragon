<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use OwenIt\Auditing\Events\Auditing as ModelAuditing;

class Auditing
{
    /**
     * Handle the event.
     *
     * @param  vent=Auditing  $event
     * @return void
     */
    public function handle(ModelAuditing $event)
    {
        if(!request()->all()) {
            return false;
        }
    }
}
