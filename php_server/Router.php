<?php

class Router{
    private function getUri(){
        if (!empty($_SERVER['REQUEST_URI'])){
            return $uri=trim($_SERVER['REQUEST_URI'],'/');
        }
    }
    private function remove_first_indexes($arr,$count){
        for ($i=0; $i<$count; $i++){
            array_shift($arr);
        }
        return $arr;
    }
    private function setObject_from_uri($uri){
        $obj=[];
        $segment = explode('/',$uri);
        $segment = $this->remove_first_indexes($segment,2);
        $obj[]=$segment[0];
        $obj[]=$segment[1];
        $segment = $this->remove_first_indexes($segment,2);
        $obj[] = array_values($segment);
        return $obj;
    }
    private function exist_controller_function($controllerName,$funcName){
        include_once (ROOT.'/controllers/'.$controllerName.'.php');
        if (!class_exists($controllerName)) {
            echo json_encode('Controller not exist !');
            return false;
        }else{
            include_once (ROOT.'/controllers/'.$controllerName.'.php');
            $user = new $controllerName;
            if (!method_exists($user,$funcName)){
                echo json_encode('Function not exist !');
                return false;
            }else{
                return true;
            }
        }
    }
    private function methode_permission($controllerName,$funcName,$http_authorization){
        $get_permission = new Autorization($controllerName,$funcName,$http_authorization);
        return $get_permission->get_permission();
    }
    private function call_methode($controllerName,$funcName,$data=null){
        include_once (ROOT.'/controllers/'.$controllerName.'.php');
        $user = new $controllerName;
        $user->$funcName();
    }
    public function run(){
        $uri = $this ->getUri();
        $uri_object = $this->setObject_from_uri($uri);
        $exist = $this->exist_controller_function($uri_object[0],$uri_object[1]);
        if ($exist == true){
            $permission = $this->methode_permission($uri_object[0],$uri_object[1],$_SERVER[HTTP_AUTHORIZATION]);
            if ($permission == true){
                $this->call_methode($uri_object[0],$uri_object[1],$uri_object[2]);
            }
        }
    }

}