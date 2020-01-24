<?php

class Users{

    public $username;
    public $password;
    public $message;
    public $status;

    private $conn;
    private $users_tb;
    private $projects_tb;

    public function __construct($db){
        $this->conn = $db;
        $this->users_tb = "users";
        $this->projects_tb = "projects";
    }

    public function createUser(){
        $query = "INSERT INTO ".$this->users_tb." SET username = ?, password = ?";
        $user_obj = $this->conn->prepare($query);
        $user_obj->bind_param("ss", $this->username, $this->password);
        if($user_obj->execute()){
            return true;
        }
        return false;
    }
}

?>