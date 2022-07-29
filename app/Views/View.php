<?php

namespace App\Views;

use Laminas\Diactoros\Response;
use Twig\Environment;

class View
{
    protected Response $response;
    protected Environment $twig;

    public function __construct(Environment $twig, Response $response)
    {
        $this->response = $response;
        $this->twig = $twig;
    }

    public function render(string $viewPath, array $data = []): Response
    {
        $this->response->getBody()->write($this->twig->render($viewPath, $data));
        return $this->response;
    }
}
