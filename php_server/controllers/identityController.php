<?php


class identityController{

    function user_registration($data){
        $model = new Model\identityModel();
        $result = $model->add_user_into_database($data);
        echo json_encode($result);
        exit;
    }

    private function user_authorization($id, $email): string{
        $jwt = new JwtToken\JwtToken();
        return $response_jwt = $jwt->getJwt($id,$email);
    }

    function user_authentication($data){
            $model = new Model\identityModel();
            $result = $model->get_user_from_database($data);
            if($result == true){
            $response_jwt = $this->user_authorization($result->id,$result->email);
            echo json_encode($response_jwt);
        }else{
            echo json_encode('False , User not exist');
        }
    }
}