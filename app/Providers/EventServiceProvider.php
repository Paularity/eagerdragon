<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\NewUserAdded' => [
            'App\Listeners\ActionsAfterUserWasAdded',
        ],
        'OwenIt\Auditing\Events\Audited' => [
            'App\Listeners\UpdateUserStatus',
        ],
        'OwenIt\Auditing\Events\Auditing' => [
            'App\Listeners\Auditing',
        ],
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\RequestForAccessCode',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
