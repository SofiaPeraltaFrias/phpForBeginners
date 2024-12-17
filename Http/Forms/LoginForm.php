<?php

namespace Http\Forms;

use Core\Validator;
use Core\App;

class LoginForm {
    protected $errors = [];

    public function validate($email, $password) {
        $errors = [];

        if (!Validator::email($email)) {
            $this->errors['email'] = "Please provide a valid email address.";
        }

        if (!Validator::string($password, 7, 255)) {
            $this->errors['password'] = "Password must be at least 7 characters long.";
        }

        $db = App::resolve('Core/Database');

        $user = $db->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if (!$user) {
            $this->errors['email'] = "No matching account found for that email address.";
        }

        if ($user) {
            if (password_verify($password, $user['password']) ){
                login($user);
            } else {
                $this->errors['password'] = "Password is incorrect.";
            }
        }

        return empty($this->errors);
    }

    public function errors() {
        return $this->errors;
    }
}

?>