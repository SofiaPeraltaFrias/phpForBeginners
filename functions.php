<?php

function urlIs($url) {
    return $_SERVER['REQUEST_URI'] === $url;
}

function authorize($condition, $status = 403) {
  if (!$condition) {
    abort($status);
  }
}

?>