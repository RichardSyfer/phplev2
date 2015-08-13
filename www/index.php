<?php
//require __DIR__ . '/models/article.php';
require __DIR__ . '/classes/Article.php';
require __DIR__ . '/classes/Php2SQL.php';

$news = new News();
$articles = $news->getAll();

//$items = Article_getAll();

include __DIR__ . '/views/index.php';