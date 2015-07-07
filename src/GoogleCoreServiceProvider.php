<?php

namespace Kurt\Google;

use Illuminate\Support\ServiceProvider;

class GoogleCoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerGoogle();
    }

    /**
     * Register Google Commands.
     *
     * @return void
     */
    private function registerGoogle()
    {
        $this->app->singleton(Core::class, function ($app) {
            return new Core;
        });
    }

    private function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/config/google.php' => config_path('google.php'),
        ]);
    }
}
