<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
  '/' => 'controllers/home.php',
  '/about' => 'controllers/about.php',
  '/contact' => 'controllers/contact.php'
];

function routeToController($uri, $routes) {
  if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
  } else {
    die();
  }
}


routeToController($uri, $routes);

?>