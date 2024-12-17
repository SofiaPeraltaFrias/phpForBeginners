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

$db = App::resolve('Core/Database');

$user = $db->query('select * from users where email = :email', [
  'email' => $email
])->find();

if (!$user) {
    $errors['email'] = "No matching account found for that email address.";
}

if ($user) {
  if (password_verify($password, $user['password']) ){
    login($user);
  } else {
    $errors['password'] = "Password is incorrect.";
  }
}

if (!empty($errors)) {
    return view('sessions/create.view.php', [
      'email' => $email,
      'errors' => $errors
    ]);
}

login($user);
header('location: /');
exit();

?>