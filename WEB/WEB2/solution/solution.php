<?php
 require ".vendor/autoload.php";
 use \Firebase\JWT\JWT;
 $publicKey=file_get_contents('config/id_rsa_jwt.pub');
 $username = "JohnWick";
 $iss = "HostName";
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

$jwt = JWT::encode($payload_info, $publicKey, "HS256");
echo $jwt;

