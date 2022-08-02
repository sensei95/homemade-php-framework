<?php

use Laminas\Diactoros\Response\RedirectResponse;

if (! function_exists('redirect')) {
    function redirect(string $uri, int $statusCode = 302, array $headers = []): RedirectResponse
    {
        return new RedirectResponse($uri, $statusCode, $headers);
    }
}

if (! function_exists('public_path')) {
    function public_path(string $url): string
    {
        return __DIR__."/../public/$url";
    }
}
