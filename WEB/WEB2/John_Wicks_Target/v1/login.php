<?php
ini_set("display_errors",1);
require "../vendor/autoload.php";
use \Firebase\JWT\JWT;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-type: application/json; charset=utf-8");
include_once("../config/database.php");
include_once("../classes/Users.php");

$db = new Database();
$conn = $db->connect();
$user = new Users($conn);
$privateKey = file_get_contents('../config/id_rsa_jwt.pem'); 

if($_SERVER['REQUEST_METHOD']==="POST"){
    $data = json_decode(file_get_contents("php://input"));
    if(!empty($data->username) && !empty($data->password)){
        $user->username = $data->username;
        $user->password = $data->password;
        $userData = $user->login();
        if(!empty($userData)){
            $username = $userData['username'];
            $iss = "Continental";
            $iat = time();
            $nbf = $iat + 10;
            $exp = $iat + 30000;
            $aud = "non-root";
            $data = array("username" => $username);

            $payload_info = array(
                "iss" => $iss,
                "iat" => $iat,
                "nbf" => $nbf,
                "exp" => $exp,
                "aud" => $aud,
                "data" => $data
            );
            $jwt = JWT::encode($payload_info,$privateKey, "RS256");
            http_response_code(200);
            echo json_encode(array(
                "status" => 1,
                "authToken" => $jwt,
                "message" => "  You have logged in!"
            ));
        }
        else{
            http_response_code(404);
            echo json_encode(array(
                "status" => 0,
                "message" => "Invalid credentials!"
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