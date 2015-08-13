<?php
//require __DIR__ . '/models/article.php';
require __DIR__ . '/classes/Article.php';
require __DIR__ . '/classes/Php2SQL.php';

if (!empty($_GET['id'])) {
    $art_id = (int)$_GET['id'];
    $news = new News();
    $news->id = $art_id;
    $article = $news->getArticleById();
}

include __DIR__ . '/views/article.php';