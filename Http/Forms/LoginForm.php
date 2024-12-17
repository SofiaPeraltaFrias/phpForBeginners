<?php

namespace Http\Forms;

use Core\Validator;

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

        return empty($this->errors);
    }

    public function errors() {
        return $this->errors;
    }
}

?>