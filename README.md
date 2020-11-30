# Laravel Influxdb2

A service made to provide, set up and use the library from influxdata [influxdb-client-php](https://github.com/influxdata/influxdb-client-php) in Laravel.

## Installing

* Install by composer command:

```sh
composer require amantinetti/laravel-influxdb2
```

* Or add this line to require section of ```composer.json``` and execute on your terminal ```$ composer install```

```json
"require": {
    "amantinetti/laravel-influxdb2": "^1.0"
}
```


## This package use auto-discover, if using less than version laravel 5.5 you must use below settings

* Add this lines to yours config/app.php (Use only with Laravel version less than 5.5 )

```php
'providers' => [
//  ...
    amantinetti\InfluxDB\Providers\ServiceProvider::class,
]
```

```php
'aliases' => [
//  ...
    'InfluxDB' => amantinetti\InfluxDB\Facades\InfluxDB::class,
]
```

* Define env variables to connect to InfluxDB

```ini
INFLUXDB_URL=http://localhost:8086
INFLUXDB_TOKEN=my-token
INFLUXDB_BUCKET=my-bucket
INFLUXDB_ORG=my-org
```

* Write this into your terminal inside your project

```ini
php artisan vendor:publish
```

## Reading Data

```php
<?php

// executing a query will yield a resultset object
$query_api = InfluxDB::createQueryApi();

$result = $query_api->query('from(bucket:"my-bucket") |> range(start: 1970-01-01T00:00:00.000000001Z) |> last()');


```

## Writing Data

```php
<?php

$write_api = InfluxDB::createWriteApi();
$write_api->write('h2o,location=west value=33i 15');

```

License
----

This project is licensed under the MIT License
