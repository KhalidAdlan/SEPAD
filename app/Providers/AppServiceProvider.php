<?php

namespace App\Providers;

use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    public function boot(UrlGenerator $url)
    {
        Paginator::defaultView('pagination::bulma');
        Paginator::defaultSimpleView('pagination::simple-bulma');
        Schema::defaultStringLength(191);
        $url->forceSchema('https');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {

            $this->app->register(DebugbarServiceProvider::class);
        }
    }
}
