<?php


use Core\App;
use Core\Validator;

$db = App::resolve('Core/Database');

$maxNoteLength = 30;
$errors = [];

$noteLength = strlen(trim($_POST['body']));

if (!Validator::string($_POST['body'], 1, 30)) {
  $errors['body'] = "Please enter between 1 and 30 characters.";
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
  'user_id' => $_SESSION['user']['user_id']
]);

header('location: /notes');
exit();

?>