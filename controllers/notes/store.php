<?php

use Core\Database;
use Core\App;

$db = App::resolve('Core/Database');

$maxNoteLength = 30;
$errors = [];

$noteLength = strlen(trim($_POST['body']));

if ($noteLength === 0) {
  $errors['body'] = "A body is required";
} elseif ($noteLength > $maxNoteLength) {
  $errors['body'] = "You have exceeded the maximum note length by " . ($noteLength - $maxNoteLength) . " characters.";
}

if (!empty($errors)) {
  view('notes/create.view.php', [
    'heading' => 'Create a Note',
    'errors' => $errors
  ]);
  exit();
}

$query = "INSERT INTO notes(body, user_id) VALUES(:body, :user_id)";
$db->query($query, [
  'body' => $_POST['body'],
  'user_id' => 3
]);

header('location: /notes');
exit();

?>