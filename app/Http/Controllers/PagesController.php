<?php

namespace App\Http\Controllers;

use App\Views\View;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PagesController extends Controller
{
    public function home(ServerRequestInterface $request): ResponseInterface
    {
        return $this->view->render('index.html.twig');
    }

    public function about(ServerRequestInterface $request): ResponseInterface
    {
        return $this->view->render('about.html.twig');
    }
}
