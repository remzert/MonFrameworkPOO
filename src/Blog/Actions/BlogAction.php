<?php

namespace App\Blog\Actions;

use App\Blog\Table\PostTable;
use Framework;
use Framework\Actions\RouterAwareAction;
use Framework\Renderer\RendererInterface;
use GuzzleHttp\Psr7\Response;
use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogAction
{

    /**
     * @var PostTable
     */
    private $postTable;

    /**
     * @var Framework\Router
     */
    private $router;

 
    /**
     * @var RendererInterface
     */
    private $renderer;
    
    use RouterAwareAction;

    public function __construct(RendererInterface $renderer, Framework\Router $router, PostTable $postTable)
    {
        $this->renderer = $renderer;
        $this->router = $router;
        $this->postTable = $postTable;
    }
    
    public function __invoke(Request $request)
    {
        if ($request->getAttribute('id')) {
            return $this->show($request);
        }
        return $this->index();
    }


    public function index(): string
    {
        $posts = $this->postTable->findPaginated();
        return $this->renderer->render('@blog/index', compact('posts'));
    }
    
    /**
     * Affiche un article
     * @param Request $request
     * @return ResponseInterface|string
     */
    public function show(Request $request)
    {
        $slug = $request->getAttribute('slug');
        $post = $this->postTable->find($request->getAttribute('id'));
       
        if ($post->slug !== $slug) {
            return $this->redirect('blog.show', [
                'slug' => $post->slug,
                'id' => $post->id
            ]);
        }
        return $this->renderer->render('@blog/show', [
            'post' => $post
        ]);
    }
}
