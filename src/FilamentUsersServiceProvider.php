<?php

namespace TomatoPHP\FilamentUsers;

use TomatoPHP\FilamentUsers\Console\PublishUserResourceCommand;
use TomatoPHP\FilamentUsers\Services\FilamentUserServices;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class FilamentUsersServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register generate command
        $this->commands([
            PublishUserResourceCommand::class,
        ]);

        // Register Config file
        $this->mergeConfigFrom(__DIR__ . '/../config/filament-users.php', 'filament-users');

        // Publish Config
        $this->publishes([
            __DIR__ . '/../config/filament-users.php' => config_path('filament-users.php'),
        ], 'filament-users-config');

        // Register Langs
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'filament-users');

        // Publish Lang
        $this->publishes([
            __DIR__ . '/../resources/lang' => base_path('lang/vendor/filament-users'),
        ], 'filament-users-lang');

        $this->app->bind('filament-user', function () {
            return new FilamentUserServices;
        });
    }

    public function boot(): void
    {
        // you boot methods here
    }
}
