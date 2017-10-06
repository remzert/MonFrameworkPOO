<?php

namespace Framework\Router;

/**
 * Class Route
 * Represent a matched route
 *
 */
class Route
{

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var callable
     */
    private $callback;

    /**
     * @var string
     */
    private $name;

    public function __construct(string $name, callable $callback, array $parameters)
    {
        
        $this->name = $name;
        $this->callback = $callback;
        $this->parameters = $parameters;
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @return callback
     */
    public function getCallback(): callable
    {
        return $this->callback;
    }
    
    /**
     * Retrieve the URL parameters
     * @return string[]
     */
    public function getParams(): array
    {
        return $this->parameters;
    }
}
