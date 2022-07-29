<?php

require_once __DIR__.'/../bootstrap/app.php';

$router = new League\Route\Router();

require_once __DIR__.'/../routes/web.php';

$response = $router->dispatch($container->get('request'));

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);
