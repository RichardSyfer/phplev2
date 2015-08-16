<?php

class AdminController
{
    public function actionAddNews()
    {


        if (!empty($_POST)) {
            $news = new News();

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

        include __DIR__ . '/../views/admin/addnews.php';
    }
}