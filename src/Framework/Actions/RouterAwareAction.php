<?php

namespace Framework\Actions;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Rajoue des méthodes liée à l'utilisation du Router
 */
trait RouterAwareAction
{
    
    /**
     * Renvoie une reponse de redirection
     *
     * @param string $path
     * @param array $params
     * @return ResponseInterface
     */
    public function Redirect(string $path, array $params = []): ResponseInterface
    {
         $redirectUri = $this->router->generateUri($path, $params);
         return (new Response())
                ->withStatus(301)
                ->withHeader('Location', $redirectUri);
    }
}
