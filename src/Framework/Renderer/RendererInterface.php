<?php

namespace Framework\Renderer;

interface RendererInterface
{
    /**
     * Permet de rajouter un chemin pour charger les vue
     * @param string $namespace
     * @param string $path
     */
    public function addPath(string $namespace, ?string $path = null): void;
    
    
    /**
     * Permet de rendre une vue
     * Le chemin peut êre précisé avec des namespace rajoutés via le addPath()
     * $this->render('@blog/view');
     * $this->render('view');
     * @param string $view
     * @param array $params
     * @return string
     */
    public function render(string $view, array $params = []): string;
    
        
    /**
     * Permet de rajouter des variables globales à toutes les vues
     * @param string $key
     * @param mixed $value
     */
    public function addGlobal(string $key, $value): void;
}
