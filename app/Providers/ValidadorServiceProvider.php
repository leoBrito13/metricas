<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Validador;

class ValidadorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Validador::class, function ($app) {
            return new Validador();
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
