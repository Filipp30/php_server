<?php

class mainController{

    function get_all_users(){
        $model = new Model\mainModel();
        $result = $model->get_all_users();
        echo json_encode($result);
        exit;
    }
//    function add_user($data){
//        $user = new DbConnection();
//        $pdo = $user->get_db();
//        $sql = "INSERT INTO users(username,email,pass,usertype)VALUES(?,?,?,?)";
//        $query=$pdo->prepare($sql);
//        $query->execute([$data[0],$data[1],$data[2],$data[3]]);
//        exit;
//    }
    function send_mail($data){
        echo json_encode($data);
        exit;
    }

}
