<?php

class Router{
    private function getUri(){
        if (!empty($_SERVER['REQUEST_URI'])){
            return $uri=trim($_SERVER['REQUEST_URI'],'/');
        }
    }
    private function setObject_from_uri($uri){
        $obj=[];
        $segment = explode('/',$uri);
        array_shift($segment);
        $obj[]=$segment[1];
        $obj[]=$segment[2];
        for ($i=0; $i<2; $i++){
            array_shift($segment);
        }
        $obj[] = array_values($segment);
        return $obj;
    }
    private function callController($controllerName,$funcName,$parameters = ""){

        include_once (ROOT.'/controllers/'.$controllerName.'.php');
        $user = new $controllerName;
//                                                                            controle maken ( controller not exists)
        if (!method_exists($user,$funcName)){
            echo json_encode('function not exist !');
        }else{
            $user->$funcName();
        }
    }
    function run(){
        $uri = $this ->getUri();
        $uri_object = $this->setObject_from_uri($uri);
        $this->callController($uri_object[0],$uri_object[1]);
    }

}