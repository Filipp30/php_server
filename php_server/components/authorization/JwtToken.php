<?php

namespace JwtToken;
use \Firebase\JWT\JWT;

class JwtToken{

    function getJwt(){

        $key = "examplekey";
        $payload = array(
            "sub" => "Filipp",
            "name" => "Grigoruk",
            "iat" => 1356999524,
            "nbf" => 1357000000
        );
        $jwt = JWT::encode($payload, $key);
//    $decoded = JWT::decode($jwt, $key, array('HS256'));
        return $jwt;
    }


}



