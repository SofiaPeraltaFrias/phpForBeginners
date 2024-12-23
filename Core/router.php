<?php

namespace Core;

use Core\Middleware\Guest;
use Core\Middleware\Auth;
use Core\Middleware\Middleware;

class Router {
  protected $routes = [];

  public function add($uri, $controller, $method) {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method, 
      'middleware' => null
    ];

    return $this;
  }

  public function get($uri, $controller) {
    return $this->add($uri, $controller, "GET");
  }

  public function post($uri, $controller) {
    return $this->add($uri, $controller, "POST");
  }

  public function delete($uri, $controller) {
    return $this->add($uri, $controller, "DELETE");
  }

  public function patch($uri, $controller) {
    return $this->add($uri, $controller, "PATCH");
  }

  public function put($uri, $controller) {
    return $this->add($uri, $controller, "PUT");
  }

  public function only($key) {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    
    return $this;
  }

  public function route($uri, $method) {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
        Middleware::resolve($route['middleware']);
        require basepath("Http/controllers/{$route['controller']}");
        exit();
      }
    }

    $this->abort();
  }

  protected function abort($status = Response::NOT_FOUND) {
    http_response_code($status);
    require basepath("Http/controllers/$status.php");
    die();
  }


}

?>