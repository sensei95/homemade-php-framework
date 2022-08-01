<?php
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;

// map a route
$router->get('/', [PagesController::class,'home'])->setName('home');
$router->get('/about', [PagesController::class,'about'])->setName('about');


$router->get('/posts', [PostController::class,'index'])->setName('posts.index');
$router->get('/posts/create', [PostController::class,'create'])->setName('posts.create');
$router->get('/posts/{slug:slug}', [PostController::class,'show'])->setName('posts.show');
