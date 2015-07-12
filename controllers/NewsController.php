<?php

class newsController {

    public function actionShowAll(){

        $newsViews = News::getAll();
        include_once __DIR__.'/../views/news/newsAll.php';

    }

    public function actionShowOne(){

        $id = $_GET['id'];
        $item = News::getOne($id)[0];
        include_once __DIR__.'/../views/news/newsOne.php';
    }
}