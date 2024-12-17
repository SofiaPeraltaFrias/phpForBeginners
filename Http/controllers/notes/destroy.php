<?php 


use Core\App;

$currentUserId = $_SESSION['user']['user_id'];

$db = App::resolve('Core/Database');

$note = $db->query("select * from notes where id = :id", ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("delete from notes where id = :id", ['id' => $_POST['id']]);

header('location: /notes');
exit();


?>