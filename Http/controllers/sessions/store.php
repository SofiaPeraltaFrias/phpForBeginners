<?php

use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();

if(!$form->validate($email, $password)){
    return view('sessions/create.view.php', [
      'email' => $email,
      'errors' => $form->errors()
    ]);
}

login($user);
header('location: /');
exit();

?>