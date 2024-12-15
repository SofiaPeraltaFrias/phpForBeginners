<?php

use Core\Database;

$config = require basepath('config.php');
$db = new Database($config['database']);

$maxNoteLength = 30;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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

view('notes/create.view.php', [
  'heading' => 'Create a Note',
  'errors' => $errors
]);

?>