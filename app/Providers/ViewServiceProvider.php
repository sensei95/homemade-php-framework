<?php

namespace App\Providers;

use App\Views\View;
use Laminas\Diactoros\Response;
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

            return new View($twig, $container->get(Response::class));
        });
    }
}
