<?php

namespace amantinetti\InfluxDB\Facades;

use Illuminate\Support\Facades\Facade as LaravelFacade;
use InfluxDB2\Client;

class InfluxDB extends LaravelFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Client::class;
    }
}