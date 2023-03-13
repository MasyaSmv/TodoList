<?php

namespace App\App;

use Exception;
use RuntimeException;

class Router
{
    /**
     * @var array[]
     */
    protected $routes = [
        'GET' => [],
        'POST' => [],
    ];

    /**
     * @param $file
     * @return static
     */
    public static function load($file)
    {
        $router = new static();
        require $file;

        return $router;
    }

    /**
     * @param $uri
     * @param $controller
     * @return void
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * @param $uri
     * @param $controller
     * @return void
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * @param $uri
     * @param $method
     * @return mixed|string
     * @throws Exception
     */
    public function direct($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            return $this->callAction(...explode('@', $this->routes[$method][$uri]));
        }

        return 'views/404.php';
    }

    /**
     * @param $controller
     * @param $action
     * @return mixed
     * @throws Exception
     */
    protected function callAction($controller, $action)
    {
        $controller =  "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (! method_exists($controller, $action)) {
            throw new RuntimeException("{$controller} does not have {$action}");
        }

        return $controller->$action();
    }
}