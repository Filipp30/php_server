<?php

namespace JwtToken;
use \Firebase\JWT\JWT;
use UnexpectedValueException;

class JwtToken{

    function getJwt($id,$email): string{
        $payload = array(
            "id" => $id,
            'email' => $email,
            "exp" => time()+120
        );
        try{
            return $jwt = JWT::encode($payload, $_ENV['JWT_SECRET_KEY']);
        }catch(UnexpectedValueException $e){
            echo $e;
        }
    }
}



