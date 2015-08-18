<?php

class AdminController
{
    public function actionAddNews()
    {
        if (!empty($_POST)) {
            $news = new NewsModel();

            if (!empty($_POST['title'])) {
                $news->title = $_POST['title'];
            }
            if (!empty($_POST['article_prev'])) {
                $news->article_prev = $_POST['article_prev'];
            }
            if (!empty($_POST['article_txt'])) {
                $news->article_txt = $_POST['article_txt'];
            }
            if (!empty($_POST['author'])) {
                $news->author = $_POST['author'];
            }
            if (!empty($_POST['post_date'])) {
                $news->post_date = $_POST['post_date'];
            }

           $news->insert();
           header('Location: /');
           die;
        }

        $view = new View();
        $view->display('admin/addnews.php');
    }

    public function actionDelNews()
    {
        $news = new NewsModel();
        $view = new View();

        if (isset($_GET['id'])) {
            $item = NewsModel::findOneByPk($_GET['id']);
            $view->item = $item;
            $view->deleted = true;

            //$news->delete('id', $_GET['id']);
        } else {
            $newsTitles = NewsModel::findAll();
            $view->news = $newsTitles;
        }

        $view->display('admin/delnews.php');
    }
}
