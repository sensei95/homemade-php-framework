<?php

namespace App\Providers;

use App\Views\Extensions\PublicPathExtensions;
use App\Views\Extensions\RoutePathExtensions;
use App\Views\View;
use Laminas\Diactoros\Response;
use League\Route\Router;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use League\Container\ServiceProvider\AbstractServiceProvider;

class ViewServiceProvider extends AbstractServiceProvider
{
    public function provides(string $id): bool
    {
        $services  = [
            View::class
        ];

        return in_array($id, $services);
    }

    public function register(): void
    {
        $container = $this->getContainer();

        $container->add(View::class, function () use ($container) {
            $loader = new FilesystemLoader(__DIR__.'/../../resources/views');
            $twig = new Environment($loader, [
                'cache' => false,
            ]);

            $twig->addExtension(new RoutePathExtensions($container->get(Router::class), $container->get('request')));
            $twig->addExtension(new PublicPathExtensions());
            return new View($twig, $container->get(Response::class));
        });
    }
}
