<?php
require __DIR__ . '/models/article.php';

if (!empty($_GET['id'])) {
    $art_id = (int)$_GET['id'];
    $article = Article_getArticleById($art_id);
}

include __DIR__ . '/views/article.php';