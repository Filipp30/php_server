<?php


class mainModel{

    function get_all_users(){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql= "SELECT * FROM users";
        $query=$pdo->prepare($sql);
        $query->execute();
        return $result= $query->fetchAll(PDO::FETCH_OBJ);

    }
    function add_user($data){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql = "INSERT INTO users(username,email,pass,usertype)VALUES(?,?,?,?)";
        $query=$pdo->prepare($sql);
        $query->execute([$data[0],$data[1],$data[2],$data[3]]);
//        controle of het insert gelukt is en return true
    }





}