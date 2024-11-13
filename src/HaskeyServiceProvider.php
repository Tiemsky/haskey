<?php

namespace Tiemsky\HasKey;

use Illuminate\Support\ServiceProvider;

class HasKeyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Publish configuration file to the main Laravel config directory
        $this->publishes([
            __DIR__ . '/../config/haskey.php' => config_path('haskey.php'),
        ], 'config');
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        // Merge default configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/haskey.php', 'haskey');
    }
}
