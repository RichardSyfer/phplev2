<?php

require __DIR__ . '/classes/Php2SQL.php';
require __DIR__ . '/classes/Article.php';

$news = new News();
$news->id = 2;
var_dump($news->getArticleById());

/*
$news->title = 'Title 1';
$news->article_prev = 'Text article preview';
$news->article_txt = 'Full text of article';
$news->author = 'Author of this text';
$news->post_date = '2015-05-23';
$news->insert();*/

