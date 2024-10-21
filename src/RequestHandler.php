<?php

class RequestHandler {
    private $routes;

    public function __construct($routes) {
        $this->routes = $routes;
    }

    public function handleRequest($requestMethod, $requestUri, $requestData) {
        if ($requestMethod === 'GET') return [
            'status' => 400,
            'body' => 'Does not handle GET',
        ];

        if (!array_key_exists($requestUri, $this->routes)) return [
            'status' => 404,
            'body' => 'Not found',
        ];

        $handler = $this->routes[$requestUri]['handler'];
        $controller = new $handler($requestData);
        $response = $controller->handle();
        return $response;
    }
}