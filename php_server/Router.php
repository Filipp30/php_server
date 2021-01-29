<?php



class Router{
    private function getUri(): string{
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
    private function setObject_from_uri($uri): array{
        $obj=[];
        $segment = explode('/',$uri);
        $segment = $this->remove_first_indexes($segment,2);
        $obj[]=$segment[0];
        $obj[]=$segment[1];
        $segment = $this->remove_first_indexes($segment,2);
        $obj[] = array_values($segment);
        return $obj;
    }
    private function exist_controller_function($controllerName,$funcName): bool{
        include_once (ROOT.'/controllers/'.$controllerName.'.php');
        if (!class_exists($controllerName)) {
            echo json_encode('Controller not exist !');
            return false;
        }else{
            $user = new $controllerName;
            if (!method_exists($user,$funcName)){
                echo json_encode('Function not exist !');
                return false;
            }else{
                return true;
            }
        }
    }
    private function methode_permission($controllerName,$funcName,$http_authorization): bool{
        $get_permission = new Authorization\Authorization($controllerName,$funcName,$http_authorization);
        return $get_permission->get_permission();
    }
    private function get_content(){
        return $body = json_decode(file_get_contents("php://input"));
    }
    private function call_methode($controllerName,$funcName,$data=null){
        if (isset($_SERVER['CONTENT_TYPE'])){
            $data = $this->get_content();
        }
        include_once (ROOT.'/controllers/'.$controllerName.'.php');
        $user = new $controllerName;
        $user->$funcName($data);
    }

    // 1. Get URL from www/JS
    // 2. Create array witch Controller-Methode-Param
    // 3. Check if Controller-Methode exist
    // 4. JWT
    // 5. Call Controller-Methode
    public function run(){
        $uri = $this ->getUri();
        $uri_object = $this->setObject_from_uri($uri);
        $exist = $this->exist_controller_function($uri_object[0],$uri_object[1]);
        if ($exist == true){
            $permission = $this->methode_permission($uri_object[0],$uri_object[1],$_SERVER['HTTP_AUTHORIZATION']);
            if ($permission == true){
                $this->call_methode($uri_object[0],$uri_object[1],$uri_object[2]);
            }else{
                echo json_encode('jwt token not valid');
            }
        }
    }
}