<?php

namespace App\Providers;

use League\Route\Router;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequestFactory;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Route\Strategy\ApplicationStrategy;

class AppServiceProvider extends AbstractServiceProvider
{
    public function provides(string $id): bool
    {
        $services = [
            Router::class,
            Response::class,
            'request',
        ];

        return in_array($id, $services);
    }

    public function register(): void
    {
        $container = $this->getContainer();

        $container->add(Router::class, function () use ($container) {
            $strategy = (new ApplicationStrategy())->setContainer($container);

            return (new Router())->setStrategy($strategy);
        })->setShared(true);

        $container->add(Response::class)->setShared(true);


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
