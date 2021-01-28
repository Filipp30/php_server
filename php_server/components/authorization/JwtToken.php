<?php

namespace JwtToken;
use \Firebase\JWT\JWT;
use UnexpectedValueException;

class JwtToken{

    function getJwt($id){

        $key ="j6gbbO8zWI1rsb5UlHxEluRpyptMEuSv8phs9sc5DSaS4hql2YNE3TM";
        $payload = array(
            "id" => $id,
            'iss' => $_SERVER['HOST_NAME'],
            "exp" => time()+120
        );
        try{
            return $jwt = JWT::encode($payload, $key);
        }catch(UnexpectedValueException $e){
            echo $e;
        }

    }


}



