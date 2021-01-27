<?php


class identityController{


    function user_registration($data){
            $model = new Model\identityModel();
            $result = $model->add_user_into_database($data);
            echo json_encode($result);
            exit;
    }

    function user_authentication($data){
        $model = new Model\identityModel();
        $result = $model->get_user_from_database($data);
        if($result == true){
            echo json_encode('create jwt');
        }else{
            echo json_encode('False , User not exist');
        }

    }

    function user_authorization(){
        $jwt = new JwtToken\JwtToken();
        $response_jwt = $jwt->getJwt();
        echo json_encode($response_jwt);
        exit;
    }

}