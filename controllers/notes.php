<?php 

$heading = 'My Notes';

$config = require 'config.php';

$db = new Database($config['database']);

$query = "select * from notes";

$notes = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

require "views/notes.view.php";

?>