<?php
require_once __DIR__ . '/Php2SQL.php';

abstract class Article
{
    public $id;
    public $title;
    public $article_prev;
    public $article_txt;
    public $author;
    public $post_date;

    //abstract public static function getAll();
    abstract public function getArticleById();
    abstract public function insert();

}

class News extends Article
{
    public static function getAll(){
        $sql_query_str = 'SELECT * FROM articles ORDER BY post_date DESC';
        $db = new Php2SQL;
        return $db->Sql_query($sql_query_str, 'News');
    }

    public function getArticleById()
    {
        if (isset($this->id)):
            $sql_query_str = "SELECT * FROM articles WHERE id=" . $this->id;
            $db= new Php2SQL;
            return $db->Sql_query($sql_query_str, 'News');
        endif;
    }

    public function insert()
    {
        if (isset($this->title) &&
            isset($this->article_prev) &&
            isset($this->article_txt) &&
            isset($this->author) &&
            isset($this->post_date)
        ) :
                $sql_query_str = "INSERT INTO articles
              (title, article_prev, article_txt, author, post_date) VALUES
              ('" . $this->title . "', '" . $this->article_prev . "', '" .
                    $this->article_txt . "', '" . $this->author . "', '" .
                    $this->post_date . "')";
                $Sql_exec = new Php2SQL;
                $Sql_exec->Sql_exec($sql_query_str);
        endif;

    }
}