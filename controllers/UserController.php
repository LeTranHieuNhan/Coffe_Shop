<?php

class UserController extends Controller {


    public function __construct() {

        parent::__construct();
    }

    public function getLogin() {
        $user = new User($this->conn);
        $user->initAdmin();
        include "views/login.php";
    }

    public function validateLogin() {
        var_dump($this->req); // the $this->req === $_POST
        $user = new User($this->conn);
        if($user->userExists($this->req['username'])) {
            echo "user found!<br>";
               if(password_verify($this->req['password'],$user->user['user_password'])) {
                   $_SESSION['logged_in'] = true;
                   $_SESSION['user_name'] = $user->user['user_name'];
                   $_SESSION['user_role'] = $user->user['user_role'];
                   header("Location:" . ROOT . "?msg=Successful-login");
               } else {
                header("Location:" . ROOT . "login");
               }
        } else {
            // user not found error
            header("Location:" . ROOT . "login");
        }
    }

    public function create() {
        $user = new User($this->conn);
        var_dump($this->req);
        $username = $this->req['username'];
        $pw = $this->req['password'];
        $email = $this->req['email'];
        $pw_confirm = $this->req['password-confirm'];

        if($user->userExists($username))
        {
            $this->errors['username'] = "Username already taken.";
        }
        if(strlen($username < 5 || strlen($pw < 5)))
        {
            $this->errors['length'] = "Username or password must be at least 5 characters";
        }
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
        {
            $this->errors['email'] = "Invalid email address";
        }
        if($pw != $pw_confirm)
        {
            $this->errors['pw_match'] = "Passwords must match.";
        }




        if(empty($this->errors))
        {
            $user->createNewUser($username, $pw, $email);
            $_SESSION['logged_in'] = true;
            $_SESSION['user_name'] = $username;
            $_SESSION['user_role'] = 2;
            header("Location:" . ROOT . "?msg=Successful-login");
        }
        else
        {
            header("Location:" . ROOT . "register");
        }
    }
}