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
    private function callController($controllerName,$funcName,$data = null){
        include_once (ROOT.'/controllers/'.$controllerName.'.php');
        if (!class_exists($controllerName)) {
            echo json_encode('Controller not exist !');
        }else{
            $user = new $controllerName;
            if (!method_exists($user,$funcName)){
                echo json_encode('Function not exist !');
            }else{
                $user->$funcName($data);
            }
        }
    }
    function run(){
        $uri = $this ->getUri();
        $uri_object = $this->setObject_from_uri($uri);
        $this->callController($uri_object[0],$uri_object[1],$uri_object[2]);
    }

}