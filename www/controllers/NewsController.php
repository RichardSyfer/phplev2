<?php

class NewsController
{
    public function actionAll()
    {
        $articles = News::getAll();
        $view = new View();
        $view->articles = $articles;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::getOne($id);
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }
}