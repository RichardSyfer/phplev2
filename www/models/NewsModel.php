<?php

/**
 * Class NewsModel
 * @property $id;
 * @property $title;
 * @property $article_prev;
 * @property $article_txt;
 * @property $author;
 * @property $post_date;
 */
class NewsModel extends AbstractModel
{
    protected static $table = 'articles';
}
