<?php
require_once __DIR__ . '/../functions/sql.php';

function Article_getAll()
{
    $sql_query_str = 'SELECT * FROM articles';
    return Sql_query($sql_query_str);
}

function Article_getArticleById($id)
{
    $sql_query_str = "SELECT * FROM articles WHERE id = " . (int)$id ;
    return Sql_query($sql_query_str);
}

function Article_insert($data)
{
    $sql_query_str = "INSERT INTO articles
      (title, article_prev, article_txt, author, post_date) VALUES
      ('" . $data['title'] . "', '" . $data['article_prev'] . "', '" .
        $data['article_txt']. "', '" . $data['author']. "', '" .
        $data['post_date']. "')";
    Sql_exec($sql_query_str);
}