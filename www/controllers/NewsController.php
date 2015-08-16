<?php

class NewsController
{
    public function actionAll()
    {
        $articles = News::getAll();
        $view = new View();
        $view->articles = $articles;
        //var_dump($view->render('news/all.php')); die;
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