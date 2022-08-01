<?php

namespace App\Http\Controllers;

use App\Entities\Category;
use App\Entities\Post;
use App\Entities\Tag;
use DateTime;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class PostController extends Controller
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index(ServerRequestInterface $request): ResponseInterface
    {
        $posts = [
            ['title' => 'first post', 'content' => 'first post content', 'slug' => 'first-post']
        ];

        return $this->view->render('posts/index.html.twig', compact('posts'));
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function show(ServerRequestInterface $request): ResponseInterface
    {
        $post = ['title' => 'first post', 'content' => 'first post content'];
        return $this->view->render('posts/show.html.twig', compact('post'));
    }

    public function create(ServerRequestInterface $request): ResponseInterface
    {
        $tags = ['php','laravel','laravel-livewire','alpinejs'];

        $post = (new Post())
            ->setTitle('create a web app with the Tall Stack')
            ->setSlug('create-a-web-app-with-the-tall-stack')
            ->setContent('Let create a wonderfull Tall Stack App')
            ->setIsPublished(false)
            ->setCreatedAt(new DateTime());

        $category = new Category();
        $category->setName('web programming')
            ->setSlug('web-programming')
            ->setCreatedAt(new DateTime());

        $category->addPost($post);

        foreach ($tags as $t){

            $tag = (new Tag())->setName($t)->setSlug($t) ->setCreatedAt(new DateTime());
            $post->addTag($tag);
        }

        $this->entityManager->persist($category);

        $this->entityManager->persist($post);

        $this->entityManager->flush();

        dd($category, $post, $tags);

        return new Response();
    }
}
