<?php

use Framework\Renderer\RendererInterface;
use Framework\Renderer\TwigRendererFactory;
use function DI\factory;

return [
    'database.host' => 'localhost',
    'database.username' => 'root',
    'database.password' => 'root',
    'database.name' => 'POOpratique',
    'views.path' => dirname(__DIR__) . '/views',
    'twig.extensions' => [
        \DI\get(\Framework\Router\RouterTwigExtension::class)
    ],
    \Framework\Router::class => DI\object(),
    RendererInterface::class => factory(TwigRendererFactory::class),
    \PDO::class => function(\Psr\Container\ContainerInterface $c){
    return $pdo = new PDO(
                'mysql:host=' . $c->get('database.host') . ';dbname=' . $c->get('database.name'), 
                $c->get('database.username'),
                $c->get('database.password'),
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
            );
    }
];

