<?php

namespace JwtToken;
use \Firebase\JWT\JWT;

class JwtToken{

    function getJwt($id,$email){

        $key = "some_secret_key";
        $payload = array(
            "id" => $id,
            "email" => $email,
            "iat" => 1356999524,
            "nbf" => 1357000000
        );
        $jwt = JWT::encode($payload, $key);
//    $decoded = JWT::decode($jwt, $key, array('HS256'));
        return $jwt;
    }


}



