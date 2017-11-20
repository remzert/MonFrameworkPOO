<?php

namespace Framework\Twig;

class PagerFantaExtension extends \Twig_Extension
{

    /**
     * @var \Framework\Router
     */
    private $router;

    public function __construct(\Framework\Router $router)
    {
        
        $this->router = $router;
    }


    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('paginate', [$this, 'paginate'], ['is_safe' => ['html']])
        ];
    }
    
    public function paginate(\Pagerfanta\Pagerfanta $paginateResults, string $route, array $queryArgs = []): string
    {
        $view = new \Pagerfanta\View\TwitterBootstrap4View();
        return $view->render($paginateResults, function (int $page) use ($route, $queryArgs) {
            if ($page > 1) {
                $queryArgs['p'] = $page;
            }
            return $this->router->generateUri($route, [], $queryArgs);
        });
    }
}
