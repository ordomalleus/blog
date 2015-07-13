<?php

class newsController {

    public function actionShowAll(){

        $newsViews = News::getAll();
        $view = new Views();
        $view->assign('items' , $newsViews);
        $view->display('news/newsAll.php');
    }

    public function actionShowOne(){

        $id = $_GET['id'];
        $newsViews = News::getOne($id);
        $view = new Views();
        $view->assign('items' , $newsViews);
        $view->display('news/newsOne.php');
    }
}