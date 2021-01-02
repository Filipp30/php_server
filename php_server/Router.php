<?php
include_once '../controllers/mainController.php';
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
        $obj[]=$segment[0];
        $obj[]=$segment[1];
        for ($i=0; $i<2; $i++){
            array_shift($segment);
        }
        $obj[] = array_values($segment);
        return $obj;
    }

//    probleem met het oproepen van de functie en controller , kijken naar include controller en methode

    private function callController($controllerName,$funcName,$parameters = null){
//        $controllerPath = '../controllers/'.ControllerName.'.php';
//        include_once ($controllerPath);
        $controllerObject = new $controllerName;
        if (!method_exists($controllerObject,$funcName)){
            var_dump('Error');
        }else{
            call_user_func_array(array($controllerObject,$funcName),$parameters);
        }

    }
    function run(){
        $uri = $this ->getUri();
        $uri_object = $this->setObject_from_uri($uri);
        $this->callController($uri_object[0],$uri_object[1]);


//        print_r($uri_object) ;
//        echo json_encode($uri_object);

    }

}