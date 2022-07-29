<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

// map a route
$router->get('/', function (ServerRequestInterface $request): ResponseInterface {
    $response = new Laminas\Diactoros\Response();
    $response->getBody()->write('<h1>Hello, World!</h1>');
    return $response;
});
