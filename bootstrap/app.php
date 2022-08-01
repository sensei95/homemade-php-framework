<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Providers\DatabaseServiceProvider;
use League\Container\Container;
use App\Providers\AppServiceProvider;
use App\Providers\ViewServiceProvider;

$container = new Container();

// register the reflection container as a delegate to enable auto wiring
$container->delegate(
    new League\Container\ReflectionContainer()
);

$container->addServiceProvider(new AppServiceProvider());
$container->addServiceProvider(new ViewServiceProvider());
$container->addServiceProvider(new DatabaseServiceProvider());
