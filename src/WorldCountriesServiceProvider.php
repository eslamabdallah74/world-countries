<?php

namespace Melsaka\WorldCountries;

use Illuminate\Support\ServiceProvider;

class WorldCountriesServiceProvider extends ServiceProvider
{
    private $config = __DIR__ . '/config/world_countries.php';


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->config, 'world_countries');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([ $this->config => config_path('world_countries.php') ], 'world_countries');
    }
}
