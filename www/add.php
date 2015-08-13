<?php
//require __DIR__ . '/classes/Article.php';

if (!empty($_POST)) {
    //$data = [];
    $news = new News();

    if (!empty($_POST['title'])) {
    //    $data['title'] = $_POST['title'];
        $news->title = $_POST['title'];
    }
    if (!empty($_POST['article_prev'])) {
        //$data['article_prev'] = $_POST['article_prev'];
        $news->article_prev = $_POST['article_prev'];
    }
    if (!empty($_POST['article_txt'])) {
        //$data['article_txt'] = $_POST['article_txt'];
        $news->article_txt = $_POST['article_txt'];
    }
    if (!empty($_POST['author'])) {
        //$data['author'] = $_POST['author'];
        $news->author = $_POST['author'];
    }
    if (!empty($_POST['post_date'])) {
        //$data['post_date'] = $_POST['post_date'];
        $news->post_date = $_POST['post_date'];
    }
/*
    if (isset($data['title']) &&
        isset($data['article_prev']) &&
        isset($data['article_txt']) &&
        isset($data['author']) &&
        isset($data['post_date'])
    ) {
        Article_insert($data);
        header('Location: /');
        die;
    }*/

    $news->insert();
    header('Location: /');
    die;

}

include __DIR__ . '/views/add.php';