<?php
require "../vendor/autoload.php";
use \Firebase\JWT\JWT;

class Users{
    public $username;
    public $password;
    public $message;
    public $status;

    private $conn;
    private $users_tb;
    private $messages_tb;
    private $publicKey;

    public function __construct($db){
        $this->conn = $db;
        $this->users_tb = "web3users";
        $this->messages_tb = "messages";
        $this->publicKey = file_get_contents('../config/id_rsa_jwt.pub');
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

    public function login(){
        $query = "SELECT * FROM ".$this->users_tb." WHERE username = ? AND password = ?";
        $user_obj = $this->conn->prepare($query);
        $user_obj->bind_param("ss", $this->username, $this->password);
        if($user_obj->execute()){
            $userData = $user_obj->get_result();
            return $userData->fetch_assoc();
        }
        return array();
    }

    public function userAuthorizationHeader(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { 
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                try{
                  $decodedData = JWT::decode($matches[1], $this->publicKey, array("HS256", "HS384", "HS512", "RS256", "RS384", "RS512"));
                  $this->username = $decodedData->data->username;
                  return true;
                }catch(Exception $exc){
                  return false;
                }
            }
        }
        return false;
    }

    public function getProfileData(){
        $query = "SELECT message FROM ".$this->messages_tb." WHERE username = ?";
        $user_query = $this->conn->prepare($query);
        $user_query->bind_param("s", $this->username);
        if($user_query->execute()){
            $user_query->bind_result($message);
            $user_query->fetch();
            return $message;
        }
        return array();
    }
}

?>