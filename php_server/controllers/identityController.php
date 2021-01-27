<?php


class identityController{


    function user_registration($data){
            $model = new Model\identityModel();
            $result = $model->add_user($data);
            echo json_encode($result);
            exit;
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