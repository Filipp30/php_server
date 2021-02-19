<?php

namespace JwtToken;
use \Firebase\JWT\JWT;
use UnexpectedValueException;

class JwtToken{

    function getJwt($id,$email): string{
        $exp_time = $_ENV['JWT_TOKEN_EXP'];
        $payload = array(
            "id" => $id,
            'email' => $email,
            "exp" => time()+$exp_time
        );
        try{
            return $jwt = JWT::encode($payload, $_ENV['JWT_SECRET_KEY']);
        }catch(UnexpectedValueException $e){
            echo $e;
        }
    }
}



