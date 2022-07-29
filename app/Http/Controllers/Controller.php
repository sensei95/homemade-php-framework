<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface;

class Controller
{
    public ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }
}
