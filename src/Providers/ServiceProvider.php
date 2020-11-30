<?php

namespace amantinetti\InfluxDB\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use InfluxDB2\Client as InfluxDB;
use InfluxDB2\Model\WritePrecision;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/InfluxDB.php' => config_path('influxdb.php')
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(InfluxDB::class, function($app) {
            $client = new InfluxDB(
                [
                    "url" => config('influxdb.url'),
                    "token" => config('influxdb.token'),
                    "bucket" => config('influxdb.bucket'),
                    "org" => config('influxdb.org'),
                    "precision" => WritePrecision::NS
                ]
            );

            return $client;
        });
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            InfluxDB::class,
        ];
    }
}
