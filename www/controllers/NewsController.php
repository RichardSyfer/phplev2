<?php

class NewsController
{
    public function actionAll()
    {
        $articles = NewsModel::findAll();
        if (!empty($articles)) {
            $view = new View();
            $view->articles = $articles;
            $view->display('news/all.php');
        } else {
            $e_message = 'Page not found: Пустой результат выборки по запросу';
            $e_code = 3;
            throw new E404Exception($e_message, $e_code);
        }
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = NewsModel::findOneByPk($id);
        if (!empty($item)) {
            $view = new View();
            $view->item = $item;
            $view->display('news/one.php');
        } else {
            $e_message = 'Page not found: Пустой результат выборки';
            $e_code = 1.1;
            throw new E404Exception($e_message, $e_code);
        }
    }
}
