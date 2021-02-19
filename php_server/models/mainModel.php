<?php

namespace Model;
use DbConnection\DbConnection;
use PDO;
class mainModel{

    public function get_all_users(): array{
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql= "SELECT * FROM users";
        $query=$pdo->prepare($sql);
        $query->execute();
        return $result= $query->fetchAll(PDO::FETCH_OBJ);
    }
    function get_all_articles(){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql = "SELECT forum_articles.id,
        forum_articles.title,forum_articles.author,forum_articles.theme,forum_articles.date_time_create,
        forum_articles.description,forum_articles.date_time_update,
        count(article_comment.article_id) as comments_count
        FROM
        forum_articles LEFT JOIN article_comment on forum_articles.id = article_comment.article_id
        GROUP BY forum_articles.id,
        forum_articles.title,forum_articles.author,forum_articles.theme,forum_articles.date_time_create";
        $query=$pdo->prepare($sql);
        $query->execute();
        return $result= $query->fetchAll(PDO::FETCH_OBJ);
    }
}