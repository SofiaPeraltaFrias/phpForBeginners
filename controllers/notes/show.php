<?php 

use Core\Database;
use Core\App;

$currentUserId = 3;

$db = App::resolve('Core/Database');

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
  'heading' => 'Note',
  'note' => $note
]);


?>