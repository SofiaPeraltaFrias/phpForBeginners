<?php

namespace Core;

use Core\App;

class Authenticator {
    protected $errors = [];

    public function attempt($email, $password){
        $db = App::resolve('Core/Database');

        $user = $db->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if (!$user) {
            $this->errors['email'] = "No matching account found for that email address.";
        }

        if ($user) {
            if (!password_verify($password, $user['password']) ){
                $this->errors['password'] = "Password is incorrect.";
            } else {
                static::login($user);
                return true;
            }
        }
        return false;
    }

    public function errors() {
        return $this->errors;
    }

    public static function login($user) {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'user_id' => $user['id']
        ];
        
        session_regenerate_id(true);
    }
      
    public static function logout() {
        $_SESSION = [];
        session_destroy();
        
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}

?>