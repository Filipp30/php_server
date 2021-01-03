<?php


class DbConnection{
    public function get_db(){
        $db_name="us409094_mvc";
        $dsn = 'mysql:host=us409094.mysql.tools;dbname='.$db_name;
        $pdo = new PDO($dsn,'us409094_mvc','42(8s*eEiZ');
        return $pdo;
    }
}