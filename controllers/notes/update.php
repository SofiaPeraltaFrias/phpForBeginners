<?php


use Core\App;

$currentUserId = 3;

$db = App::resolve('Core/Database');

$note = $db->query("select * from notes where id = :id", ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$maxNoteLength = 30;
$errors = [];

$noteLength = strlen(trim($_POST['body']));

if ($noteLength === 0) {
  $errors['body'] = "A body is required";
} elseif ($noteLength > $maxNoteLength) {
  $errors['body'] = "You have exceeded the maximum note length by " . ($noteLength - $maxNoteLength) . " characters.";
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