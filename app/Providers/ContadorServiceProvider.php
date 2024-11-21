<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Contador;

class ContadorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Contador::class, function ($app) {
            return new Contador();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
