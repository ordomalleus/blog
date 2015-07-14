<?php

class newsController {

    public function actionShowAll(){

        $newsViews = News::getAll();
        $view = new Views();
        $view->news = $newsViews;
        $view->display('news/newsAll.php');
    }

    public function actionShowOne(){

        $id = $_GET['id'];
        $newsViews = News::getOne($id);
        $view = new Views();
        $view->new = $newsViews;
        $view->display('news/newsOne.php');
    }
    
    public function actionAddForm() {
        $view = new Views();
        $view->display('news/newsAdd.php');
    }
    
    public function actionAdd() {
        $title = $_POST['newName'];
        $text = $_POST['newText'];
        News::addOne($title, $text);
        $view = new Views();
        $view->redirect('index.php?ctrl=news&act=ShowAll');
        //$view->display('index.php');
    }
    
    public function actionDel() {
      
    }
}