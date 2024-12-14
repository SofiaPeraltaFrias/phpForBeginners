<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
  '/' => 'controllers/home.php',
  '/about' => 'controllers/about.php',
  '/contact' => 'controllers/contact.php',
  '/notes' => 'controllers/notes.php',
  '/note' => 'controllers/note.php'
];

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

routeToController($uri, $routes);

?>