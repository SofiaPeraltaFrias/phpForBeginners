<?php

use Core\Container;
use Core\Database;
use Core\App;

$container = new Container();

$container->bind('Core/Database', function () {
  $config = require basepath('config.php');
  return new Database($config['database']);
});

App::setContainer($container);

?>