<?php

use Laminas\Diactoros\Response\RedirectResponse;

if(! function_exists('redirect'))
{
    function redirect(string $uri, int $statusCode = 302, array $headers = []): RedirectResponse
    {
        return new RedirectResponse($uri, $statusCode, $headers);
    }
}
