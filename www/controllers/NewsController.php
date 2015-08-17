<?php

class NewsController
{
    public function actionAll()
    {
        $articles = NewsModel::findAll();
        $view = new View();
        $view->articles = $articles;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = NewsModel::findOneByPk($id);
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }
}
