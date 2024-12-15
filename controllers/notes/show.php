<?php 

use Core\Database;

$currentUserId = 3;

$config = require basepath('config.php');
$db = new Database($config['database']);

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
  'heading' => 'Note',
  'note' => $note
]);


?>