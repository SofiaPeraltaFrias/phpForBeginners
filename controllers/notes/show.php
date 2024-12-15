<?php 

$heading = 'Note';

$currentUserId = 3;

$config = require 'config.php';

$db = new Database($config['database']);
 
$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

require "views/notes/show.view.php";

?>