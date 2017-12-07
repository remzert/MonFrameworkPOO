<?php

namespace App\Admin;

use Framework\Module;

class AdminModule extends Module
{
    const DEFINITIONS =__DIR__ . '/config.php';
    
    public function __construct(\Framework\Renderer\RendererInterface $renderer)
    {
        $renderer->addPath('admin', __DIR__.'/views');
    }
}
