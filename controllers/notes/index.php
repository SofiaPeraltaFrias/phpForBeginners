<?php 

use Core\Database;
use Core\App;

$db = App::resolve('Core/Database');

$query = "select * from notes";

$notes = $db->query($query)->findAll(PDO::FETCH_ASSOC);

view('notes/index.view.php', [
  'heading' => 'My Notes',
  'notes' => $notes
]);


?>