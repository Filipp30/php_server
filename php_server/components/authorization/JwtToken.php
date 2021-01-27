<?php

namespace JwtToken;
use \Firebase\JWT\JWT;

class JwtToken{

    function getJwt(){

        $key = "some_secret_key";
        $payload = array(
            "sub" => "someUser",
            "name" => "someUser",
            "iat" => 1356999524,
            "nbf" => 1357000000
        );
        $jwt = JWT::encode($payload, $key);
//    $decoded = JWT::decode($jwt, $key, array('HS256'));
        return $jwt;
    }


}



