<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ServerRequestInterface;

class PostController extends Controller
{
    public function index(ServerRequestInterface $request)
    {
        return $this->view->render('posts/index.html.twig');
    }

    public function show(ServerRequestInterface $request)
    {
        return $this->view->render('posts/show.html.twig');
    }
}
