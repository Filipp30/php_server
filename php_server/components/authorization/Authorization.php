<?php

namespace Authorization;
use \Firebase\JWT\JWT;
class Authorization{

    private $controllerName;
    private $functionName;
    private $jwt_authorization;
    private $key="j6gbbO8zWI1rsb5UlHxEluRpyptMEuSv8phs9sc5DSaS4hql2YNE3TM";
    function __construct($controllerName,$functionName,$jwt_authorization){
    $this->controllerName = $controllerName;
    $this->functionName = $functionName;
    $this->jwt_authorization = $jwt_authorization;
    }

    function get_permission(){

        if($this->controllerName == 'identityController'
            && $this->functionName == 'user_authentication'){
            return true;
        }else{
        try{
            $user_jwt_decoded = JWT::decode($this->jwt_authorization, $this->key, array('HS256'));
            $user_id = $user_jwt_decoded->id;
            return true;
            }catch (\Exception $e){
                if ($this->handleException($e)){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }

    function handleException($e){
        if ($e->getMessage() == 'Expired token' && $this->jwt_refresh()){
            return true;
        }else{
            return false;
        }
    }

    function jwt_refresh(){
        return false;
    }

}