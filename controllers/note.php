<?php 

$heading = 'Note';

$currentUserId = 3;

$config = require 'config.php';

$db = new Database($config['database']);
 
$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->findOrFail();

if ($note['user_id'] !== $currentUserId) {
  abort(403);
}


require "views/note.view.php";

?>