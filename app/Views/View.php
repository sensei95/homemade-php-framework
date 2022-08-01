<?php

namespace App\Views;

use Laminas\Diactoros\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class View
{
    protected Response $response;
    protected Environment $twig;

    /**
     * @param Environment $twig
     * @param Response $response
     */
    public function __construct(Environment $twig, Response $response)
    {
        $this->response = $response;
        $this->twig = $twig;
    }

    /**
     * @param string $viewPath
     * @param array $data
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render(string $viewPath, array $data = []): Response
    {
        $this->response->getBody()->write($this->twig->render($viewPath, $data));
        return $this->response;
    }
}
