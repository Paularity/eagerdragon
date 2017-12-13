<?php

namespace App\Providers;

use Bouncer;
use App\User;
use App\Observers\UserModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootstrapModelObservers();
        $this->bootstrapBouncerCaching();
        $this->boostrapDefaultDBConfig();

        \Validator::extend('not_used', 'App\Rules\NotUsed@passes');
    }

    private function boostrapDefaultDBConfig()
    {
        Schema::defaultStringLength(191);
    }

    private function bootstrapBouncerCaching()
    {
        Bouncer::cache();
    }

    private function bootstrapModelObservers()
    {
        User::observe(UserModel::class);
    }
}
