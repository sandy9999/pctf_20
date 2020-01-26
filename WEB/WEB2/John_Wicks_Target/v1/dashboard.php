<?php
ini_set("display_errors",1);
require "../vendor/autoload.php";
use \Firebase\JWT\JWT;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-type: application/json; charset=utf-8");
include_once("../config/database.php");
include_once("../classes/Users.php");

$db = new Database();
$conn = $db->connect();
$user = new Users($conn);

if($_SERVER['REQUEST_METHOD']==="GET"){
  $isLoggedIn = $user->userAuthorizationHeader();
  if($isLoggedIn){
    $userProfileData = $user->getProfileData();
    http_response_code(200);
    echo json_encode(array(
        "status" => 1,
        "message" => "You have logged in!",
        "flag" => $userProfileData
    ));
  }
  else{
    http_response_code(503);
    echo json_encode(array(
        "status" => 0,
        "message" => "Access Denied! Login first"
    ));
  }   
}

?>