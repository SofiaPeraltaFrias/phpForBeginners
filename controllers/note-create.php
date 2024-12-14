<?php

$heading = "Create a Note"; 

$config = require 'config.php';
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $errors = [];

  if (strlen($_POST['body']) === 0) {
    $errors['body'] = "A body is required";
  }

  if (empty($errors)) {
    $query = "INSERT INTO notes(body, user_id) VALUES(:body, :user_id)";
    $db->query($query, [
      'body' => $_POST['body'],
      'user_id' => 3
    ]);
  }


}

require 'views/note-create.view.php';

?>