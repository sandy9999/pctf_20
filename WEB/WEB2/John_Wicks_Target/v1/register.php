<?php
ini_set("display_errors",1);
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST");
header("Content-type: application/json; charst=UTF-8");
include_once("../config/database.php");
include_once("../classes/Users.php");

$db = new Database();
$conn = $db->connect();
$user = new Users($conn);

if($_SERVER['REQUEST_METHOD']==="POST"){
    $data = json_decode(file_get_contents("php://input"));
    if(!empty($data->username) && !empty($data->password)){
        $user->username = $data->username;
        $user->password = $data->password;
        if($user->createUser()){
            http_response_code(200);
            echo json_encode(array(
                "status" => 1,
                "message" => "User registered!"
            ));
        }
        else{
            http_response_code(500);
            echo json_encode(array(
                "status" => 0,
                "message" => "Failed to register user!"
            ));
        }
    }
    else{
        http_response_code(500);
        echo json_encode(array(
            "status" => 0,
            "message" => "Empty fields found!"
        ));
    }
}
else{
    http_response_code(503);
    echo json_encode(array(
        "status" => 0,
        "message" => "Access Denied!"
    ));
}


?>