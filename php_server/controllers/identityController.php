<?php


class identityController{


    function user_registration(){

    }

    function user_authentication(){

    }

    function user_authorization(){
        $jwt = new JwtToken\JwtToken();
        $response_jwt = $jwt->getJwt();
        echo json_encode($response_jwt);
        exit;
    }

}