<?php

use Http\Forms\LoginForm;
use Core\Authenticator;

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();

if(!$form->validate($email, $password)){
    return view('sessions/create.view.php', [
      'email' => $email,
      'errors' => $form->errors()
    ]);
}

$auth = new Authenticator();

if(!$auth->attempt($email, $password)){
  return view('sessions/create.view.php', [
    'email' => $email,
    'errors' => $auth->errors()
  ]);
}

redirect("/");

?>