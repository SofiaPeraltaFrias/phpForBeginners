<?php 

$heading = 'My Notes';

$config = [
'database' => [
  'host' => 'localhost',
  'port' => '3306',
  'dbname' => 'myapp',
  'charset' => 'utf8mb4'
  ]
];

$db = new Database($config['database']);

$query = "select * from notes";

$notes = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

require "views/notes.view.php";

?>