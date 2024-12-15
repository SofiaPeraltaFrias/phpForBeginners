<?php

$heading = "Create a Note"; 

$config = require 'config.php';
$db = new Database($config['database']);

$maxNoteLength = 30;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $errors = [];

  $noteLength = strlen(trim($_POST['body']));

  if ($noteLength === 0) {
    $errors['body'] = "A body is required";
  } elseif ($noteLength > $maxNoteLength) {
    $errors['body'] = "You have exceeded the maximum note length by " . ($noteLength - $maxNoteLength) . " characters.";
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