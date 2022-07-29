<?php

require_once __DIR__.'/../vendor/autoload.php';

use Laminas\Diactoros\Response;
use League\Container\Container;
use App\Providers\AppServiceProvider;

$container = new Container();

$container->addServiceProvider(new AppServiceProvider());
