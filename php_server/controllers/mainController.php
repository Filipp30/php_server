<?php

include_once '../components/DbConnection.php';
class mainController extends DbConnection {

    function select_All(){
        $pdo= $this->get_db();
        $sql="SELECT * FROM users";
        $query=$pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($result);
        exit;
    }


}

//$user = new mainController();
//$user->select_All();