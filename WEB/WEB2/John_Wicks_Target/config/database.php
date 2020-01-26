<?php

class Database{

    private $hostname;
    private $dbname;
    private $username;
    private $password;
    private $conn;
   
    public function connect(){
      $this->hostname = "localhost";
      $this->dbname = "capture_the_flag";
      $this->username = "";
      $this->password = "";

      $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
      if($this->conn->connect_errno){
         print_r($this->conn->connect_errno);
         exit;
      }
      else{
        return $this->conn;
      }
    }
}

$db = new Database();
$db->connect();

?>