<?php

namespace Idez\LaravelZenvia;

use Illuminate\Support\ServiceProvider;

class ZenviaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Zenvia::class, fn () => new Zenvia(
            token: config('services.zenvia.token', 'not-a-token'),
            from: config('services.zenvia.from')
        ));
    }
}
