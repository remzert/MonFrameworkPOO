<?php

namespace Framework\Session;

interface SessionInterface
{
    /**
     * Recupère une information en session
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null);
    
    /**
     * Ajoute une information en session
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function set(string $key, $value): void;
    
    /**
     * Supprime une clef en session
     * @param string $key
     */
    public function delete(string $key): void;
}
