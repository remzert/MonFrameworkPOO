<?php

namespace Framework\Renderer;

use Twig_Environment;

class TwigRenderer implements RendererInterface
{
    
    private $twig;
    
    private $loader;


    public function __construct(\Twig_Loader_Filesystem $loader, Twig_Environment $twig)
    {
        $this->loader = $loader;
        $this->twig = $twig;
    }
    
    
    public function addPath(string $namespace, string $path = null): void
    {
        $this->loader->addPath($path, $namespace);
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
