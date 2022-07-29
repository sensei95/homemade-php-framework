<?php

namespace App\Http\Controllers;

use Laminas\Diactoros\Response;

class Controller
{
    protected Response $response;

    public function __construct()
    {
        $this->response = new Response();
    }
}
