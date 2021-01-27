<?php

namespace Model;

use DbConnection\DbConnection;
use PDO;

class mainModel{

    function get_all_users(){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql= "SELECT * FROM users";
        $query=$pdo->prepare($sql);
        $query->execute();
        return $result= $query->fetchAll(PDO::FETCH_OBJ);

    }


}