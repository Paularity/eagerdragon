<?php

namespace App\Events;

use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class NewUserAdded implements ShouldQueue
{
    use Dispatchable;
    use SerializesModels;
    use InteractsWithSockets;

    public $newUser;
    public $creator;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($newUser, $creator = null)
    {
        $this->newUser = $newUser;
        $this->creator = $creator;
    }
}
