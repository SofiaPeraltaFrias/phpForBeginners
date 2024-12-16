<?php


use Core\App;
use Core\Validator;

$currentUserId = 3;

$db = App::resolve('Core/Database');

$note = $db->query("select * from notes where id = :id", ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$maxNoteLength = 30;
$errors = [];

if (!Validator::string($_POST['body'], 1, 30)) {
  $errors['body'] = "Please enter between 1 and 30 characters.";
}

if (!empty($errors)) {
  view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'errors' => $errors,
    'note' => $note
  ]);
  exit();
}

$query = "update notes set body = :body where id = :id";
$db->query($query, [
  'body' => $_POST['body'],
  'id' => $_POST['id']
]);

header("location: /note?id={$note['id']}");
exit();

?>