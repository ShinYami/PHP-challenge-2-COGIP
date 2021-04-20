<?php

namespace Router;
// pas touche
class Router
{
    public $url;
    public $routes = []; // pour stocker toutes les routes

    public function __construct($url)
    {
        $this->url = trim($url, '/');
    }



    public function get(string $path, string $action)
    {
        $this->routes['GET'][] = new Route($path, $action);
    }

    public function post(string $path, string $action)
    {
        $this->routes['POST'][] = new Route($path, $action);
    }

    public function run()
    {
        // on peut savoir comme ca dynamiquement si c est en post ou get
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                return $route->execute();
            }
        }

        echo '404';
    }
}
