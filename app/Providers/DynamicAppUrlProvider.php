<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class DynamicAppUrlProvider extends ServiceProvider
{
    public function boot()
    {
        // Define a URL da aplicação dinamicamente
        if (empty(config('app.url')) || config('app.env') !== 'production') {
            URL::forceRootUrl(request()->root());
        }
    }

    public function register()
    {
        // Você pode adicionar outras configurações ou bindings, se necessário.
    }
}
