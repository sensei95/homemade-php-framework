<?php

namespace App\Providers;

use Laminas\Diactoros\Response;
use App\Http\Controllers\Controller;
use Laminas\Diactoros\ServerRequestFactory;
use League\Container\ServiceProvider\AbstractServiceProvider;

class AppServiceProvider extends AbstractServiceProvider
{
    public function provides(string $id): bool
    {
        $services = [
            Controller::class,
            Response::class,
            'request'
        ];

        return in_array($id, $services);
    }

    public function register(): void
    {
        $container = $this->getContainer();

        $container->add(Controller::class)->setShared(true);

        $container->add('request', function () {
            return ServerRequestFactory::fromGlobals(
                $_SERVER,
                $_GET,
                $_POST,
                $_COOKIE,
                $_FILES
            );
        })->setShared(true);
    }
}
