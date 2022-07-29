<?php

namespace App\Http\Controllers;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PagesController extends Controller
{
    public function home(ServerRequestInterface $request): ResponseInterface
    {
        $this->response->getBody()->write('<h1>Hello, World!</h1>');
        return $this->response;
    }

    public function about(ServerRequestInterface $request): ResponseInterface
    {
        $this->response->getBody()->write('<h1>About Me</h1>');
        return $this->response;
    }
}
