<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
  require basepath("Core/{$class}.php");
});

require basepath('Core/router.php');

?>