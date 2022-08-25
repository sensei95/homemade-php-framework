<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use Laminas\Diactoros\ServerRequest;

// map a route
$router->get('/', [PagesController::class,'home'])->setName('home');
$router->get('/about', [PagesController::class,'about'])->setName('about');


$router->get('/posts', [PostController::class,'index'])->setName('posts.index');
$router->get('/posts/create', [PostController::class,'create'])->setName('posts.create');
$router->post('/posts/create', [PostController::class,'store'])->setName('posts.store');
$router->get('/posts/{slug:slug}', [PostController::class,'show'])->setName('posts.show');
