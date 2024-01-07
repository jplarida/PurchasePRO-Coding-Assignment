<?php

namespace App\Providers;

use App\Console\Commands\SeederMakeCustom;
use App\Console\Commands\MigrateCustom;
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

        $this->app->singleton('command.migrate.custom', function ($app) {
            return new MigrateCustom($app['migrator']);
        });

        $this->commands([
            'command.migrate.custom',
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
