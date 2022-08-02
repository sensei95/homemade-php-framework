<?php

namespace App\Views\Extensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PublicPathExtensions extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('public_path', [$this, 'publicPath'])
        ];
    }

    public function publicPath(string $url): string
    {
        return '/'.trim($url, '/');
    }
}
