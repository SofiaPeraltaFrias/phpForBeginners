<?php 

$heading = 'Note';

$config = require 'config.php';

$db = new Database($config['database']);
 
$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->findOrFail();

require "views/note.view.php";

?>