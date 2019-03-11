<?php

namespace App\Core;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    /**
     *
     * With this methods get() and post(), we only place routes on separate arrays accprdingly t the type of http request tah is send. This happens in load part when we registered routes
     *
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }


    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }


    public function direct($uri, $typeRequest)
    {
        if (array_key_exists($uri, $this->routes[$typeRequest])) { // Here we check do we have this uri register for get request
            // die($this->routes[$typeRequest][$uri]); // this is will return controller that is associated wit this uri
            //PagesController@home

            return $this->callAction(
                ...explode('@', $this->routes[$typeRequest][$uri])
            );
        }

        throw new \Exception('No route defined for this URI.');
    }

    protected function callAction($controller, $action)
    {
        // var_dump($controller, $action);
        // die();
        $controller = "App\\Controllers\\{$controller}";

        $controller = new $controller;

        if (! method_exists($controller, $action)) {
            throw new Exception("{$controller} does not respond to the {$action} section");
        }

        return $controller->$action();
    }
}
