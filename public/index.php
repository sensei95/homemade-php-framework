<?php

use League\Route\Router;

require_once __DIR__.'/../bootstrap/app.php';
/** @var  $container */
try {
    $router = $container->get(Router::class);
} catch (\Psr\Container\NotFoundExceptionInterface|\Psr\Container\ContainerExceptionInterface $e) {
    die($e->getMessage());
}

require_once __DIR__.'/../routes/web.php';

try {
    $response = $router->dispatch($container->get('request'));
    // send the response to the browser
    (new Laminas\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);
} catch (League\Route\Http\Exception\NotFoundException $e) {
    die($e->getMessage());
}
