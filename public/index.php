<?php

use League\Route\Router;

require_once __DIR__.'/../bootstrap/app.php';

$router = $container->get(Router::class);

require_once __DIR__.'/../routes/web.php';

try {
    $response = $router->dispatch($container->get('request'));
    // send the response to the browser
    (new Laminas\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);
} catch (League\Route\Http\Exception\NotFoundException $e) {
    die($e->getMessage());
}
