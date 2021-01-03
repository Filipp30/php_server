<?php


class mainController{

    function select_All(){
        $user = new DbConnection();
        $pdo = $user->get_db();
        $sql="SELECT * FROM users";
        $query=$pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($result);
        exit;
    }


}
