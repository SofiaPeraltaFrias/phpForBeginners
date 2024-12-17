<?php

use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
  $errors['email'] = "Please provide a valid email address.";
}

if (!Validator::string($password, 7, 255)) {
  $errors['password'] = "Password must be at least 7 characters long.";
}

if (!empty($errors)) {
  return view('registration/create.view.php', [
    'email' => $email,
    'errors' => $errors
  ]);
}

$db = App::resolve('Core/Database');

$user = $db->query('select * from users where email = :email', [
  'email' => $email
])->find();

if ($user) {
  header('location: /');
  exit();
} else {
  $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
  ]);

  login($user);

  header('location: /');
  exit();
}

?>