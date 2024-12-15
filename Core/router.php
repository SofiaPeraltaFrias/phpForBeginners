<?php

$routes = require basepath('routes.php');

function routeToController($uri, $routes) {
  if (array_key_exists($uri, $routes)) {
    require basepath($routes[$uri]);
  } else {
    abort();
  }
}

function abort($status = Response::NOT_FOUND) {
  http_response_code($status);

  require basepath("controllers/$status.php");

  die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);

?>