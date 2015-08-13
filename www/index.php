<?php
//require __DIR__ . '/models/article.php';
require __DIR__ . '/classes/Article.php';

$articles = News::getAll();

//$items = Article_getAll();

include __DIR__ . '/views/index.php';