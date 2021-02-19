<?php

namespace Authorization;
use \Firebase\JWT\JWT;
class Authorization{

    private string $controllerName;
    private string $functionName;


    function __construct($controllerName,$functionName){
        $this->controllerName = $controllerName;
        $this->functionName = $functionName;
    }

    function get_permission(): bool{
        $allowedOrigins = include_once('allowedOrigins.php');
        $allowed_controllers = $allowedOrigins['Controllers'];
        $allowed_methods = $allowedOrigins['Methods'];
        if(in_array($this->controllerName, $allowed_controllers) &&
            in_array($this->functionName, $allowed_methods) ){
            return true;
        }else{
        try{
                if (isset($_SERVER['HTTP_AUTHORIZATION'])){
                    $jwt_authorization = $_SERVER['HTTP_AUTHORIZATION'];
                    $user_jwt_decoded = JWT::decode($jwt_authorization,$_ENV['JWT_SECRET_KEY'], array('HS256'));
                    $user_id = $user_jwt_decoded->id;
                    return true;
                }else{ return false; }

            }catch (\Exception $e){
                if ($this->handleException($e)){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }

    private function handleException($e): bool{
        if ($e->getMessage() == 'Expired token' && $this->jwt_refresh()){
            return true;
        }else{
            return false;
        }
    }

    private function jwt_refresh(): bool{
        return false;
    }
}