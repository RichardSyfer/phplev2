<?php

class News
    extends AbstractModel
{
    public $id;
    public $title;
    public $article_prev;
    public $article_txt;
    public $author;
    public $post_date;

    protected static $table = 'articles';
    protected static $class = 'News';

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
            $db = new DB;
            $db->queryExec($sql_query_str);
        endif;

    }

}