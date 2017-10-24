<?php

namespace App\Blog\Actions;

use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogAction
{

    /**
     * @var RendererInterface
     */
    private $renderer;

    public function __construct(RendererInterface $renderer)
    {
        
        $this->renderer = $renderer;
    }
    
    public function __invoke(Request $request)
    {
        $slug = $request->getAttribute('slug');
        if ($slug) {
            return $this->show($slug);
        }
        return $this->index();
    }


    public function index(): string
    {
        //return '<h1>Bienvenue sur le blog</h1>';
        return $this->renderer->render('@blog/index');
    }
    
    public function show(string $slug): string
    {
        //return '<h1>Bienvenue sur l\'article '. $request->getAttribute('slug') .'</h1>';
        return $this->renderer->render('@blog/show', [
            'slug' => $slug
        ]);
    }
}
