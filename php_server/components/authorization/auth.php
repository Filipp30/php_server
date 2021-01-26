<?php

namespace Auth;
use \Firebase\JWT\JWT;

class Auth{

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



