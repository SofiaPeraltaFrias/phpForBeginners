<?php

$routes = require('routes.php');

function routeToController($uri, $routes) {
  if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
  } else {
    abort();
  }
}

function abort($status = Response::NOT_FOUND) {
  http_response_code($status);

  require "controllers/$status.php";

  die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);

?>