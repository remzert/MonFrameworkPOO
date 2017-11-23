<?php

namespace Framework\Renderer;

use Twig_Environment;

class TwigRenderer implements RendererInterface
{
    
    private $twig;
    
    
    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }
    
    
    public function addPath(string $namespace, string $path = null): void
    {
        $this->twig->getLoader()->addPath($path, $namespace);
    }

    public function render(string $view, array $params = array()): string
    {
        return $this->twig->render($view . '.html.twig', $params);
    }
    
    public function addGlobal(string $key, $value): void
    {
        $this->twig->addGlobal($key, $value);
    }
}
