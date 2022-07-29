<?php

use App\Http\Controllers\PagesController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

// map a route
$router->get('/', [PagesController::class,'home'])->setName('home');
$router->get('/about', [PagesController::class,'about'])->setName('about');
