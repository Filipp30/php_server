<?php


namespace Model;

use DbConnection\DbConnection;

class identityModel{

    function add_user($data){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql = "INSERT INTO users(username,email,password,first_name,last_name)VALUES(?,?,?,?,?)";
        $query=$pdo->prepare($sql);
        return $result = $query->execute(
            [$data->username,$data->email,$data->password,$data->first_name,$data->last_name]);
    }

}