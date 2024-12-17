<?php

use Core\App;

$currentUserId = $_SESSION['user']['user_id'];

$db = App::resolve('Core/Database');

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/edit.view.php', [
  'heading' => 'Edit Note',
  'note' => $note,
  'errors' => []
]);

?>