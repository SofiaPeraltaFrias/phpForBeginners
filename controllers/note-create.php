<?php

$heading = "Create a Note"; 

$config = require 'config.php';
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $query = "INSERT INTO notes(body, user_id) VALUES(:body, :user_id)";
  $db->query($query, [
    'body' => $_POST['body'],
    'user_id' => 3
  ]);
}

require 'views/note-create.view.php';

?>