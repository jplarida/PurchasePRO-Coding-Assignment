<?php

namespace App\Providers;

use App\Console\Commands\SeederMakeCustom;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton('command.seeder.custom', function ($app) {
            return new SeederMakeCustom($app['files'], $app['composer']);
        });

        $this->commands([
            'command.seeder.custom',
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
