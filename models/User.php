<?php

class User {
    public $conn;
    public $errors = [];
    public $user = [];
    public $users = [];
    public $username;
    public $user_email;
    private $hash;
    public $user_role;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function initAdmin() {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows < 1) {
            $this->username = "admin";
            $this->hash = password_hash("admin", PASSWORD_DEFAULT);
            $this->user_email = "admin@gmail.com";
            $this->user_role = "1";
            $this->createAdmin();
        }
    }

    public function createAdmin() {
        $sql = "INSERT INTO users (user_name, user_role, user_password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $this->username, $this->user_role, $this->hash);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            header("Location: " . ROOT);
            
        }
    }

    public function userExists($username) {
        $sql = "SELECT * FROM users WHERE user_name = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->user = $result->fetch_assoc(); // grab assoc array if user exists else empty
        if (!empty($this->user)) {
            return true; // user found
        } else {
            return false; // user not found
        }
    }

    public function createNewUser($username, $password, $email)
    {   
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $user_role = "2";

        $sql = "INSERT INTO users (user_name, user_password, user_role) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $username, $hash, $user_role);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            return true;
        } else {
            return $stmt;
        }
    }
}
