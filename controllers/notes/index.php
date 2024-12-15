<?php 

$config = require basepath('config.php');

$db = new Database($config['database']);

$query = "select * from notes";

$notes = $db->query($query)->findAll(PDO::FETCH_ASSOC);

view('notes/index.view.php', [
  'heading' => 'My Notes',
  'notes' => $notes
]);


?>