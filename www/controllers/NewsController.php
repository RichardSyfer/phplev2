<?php

class NewsController
{
    public function actionAll()
    {
        $articles = News::getAll();

        include __DIR__ . '/../views/news/all.php';
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::getOne($id);

        include __DIR__ . '/../views/news/one.php';
    }
}