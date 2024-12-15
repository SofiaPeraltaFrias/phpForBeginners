<?php

use Core\Response;

function urlIs($url) {
    return $_SERVER['REQUEST_URI'] === $url;
}

function authorize($condition, $status = Response::FORBIDDEN) {
  if (!$condition) {
    abort($status);
  }
}

function basepath($path) {
  return BASE_PATH . $path;
}

function view($path, $variables) {
  extract($variables);
  require basepath("views/" . $path);
}

?>