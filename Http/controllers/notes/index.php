<?php 


use Core\App;

$db = App::resolve('Core/Database');

$notes = $db->query("select * from notes where user_id = :user_id", ['user_id' => $_SESSION['user']['user_id']])->findAll(PDO::FETCH_ASSOC);

view('notes/index.view.php', [
  'heading' => 'My Notes',
  'notes' => $notes
]);


?>