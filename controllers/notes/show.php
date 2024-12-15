<?php 

use Core\Database;

$currentUserId = 5;

$config = require basepath('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //POST REQUEST, DELETE CURRENT NOTE

  $note = $db->query("select * from notes where id = :id", ['id' => $_POST['id']])->findOrFail();
  
  authorize($note['user_id'] === $currentUserId);

  $db->query("delete from notes where id = :id", ['id' => $_POST['id']]);
  
  header('location: /notes');
  exit();

} else {
  //GET REQUEST, DISPLAY NOTE
   
  $note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->findOrFail();
  
  authorize($note['user_id'] === $currentUserId);
  
  view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
  ]);
}

?>