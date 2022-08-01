<?php

namespace App\Views\Extensions;

use League\Route\Router;
use Psr\Http\Message\RequestInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RoutePathExtensions extends AbstractExtension
{
    protected Router $router;
    private RequestInterface $request;

    public function __construct(Router $router, RequestInterface $request)
    {
        $this->router = $router;
        $this->request = $request;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('route', [$this, 'route']),
            new TwigFunction('routeIs',[$this,'routeIs'])
        ];
    }

    public function route(string $routeName, array $data = null): array|string
    {
        $path = $this->router->getNamedRoute($routeName)->getPath();
        $patterns = [];
        $matches = [];
        if($data){
            foreach ($data as $k => $value){
                if(str_contains($path, "{{$k}:{$k}}")){
                    $patterns[] = "{{$k}:{$k}}";
                    $matches[] = $value;
                }else if(str_contains($path, "{{$k}}")){
                    $patterns[] = "{{$k}}";
                    $matches[] = $value;
                }

            }
            $path = (str_replace($patterns,$matches,$path));
        }

        return $path;
    }

    public function routeIs(string $routeName)
    {
        return $this->router->getNamedRoute($routeName)->getPath() === $this->request->getUri()->getPath();
    }
}
