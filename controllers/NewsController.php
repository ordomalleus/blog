<?php

class newsController
{

    public function actionShowAll()
    {
        $news       = NewsModels::getAll();
        $view       = new Views();
        $view->news = $news;
        $view->display( 'news/newsAll.php' );
    }

    public function actionShowOne()
    {
        $id        = $_GET['id'];
        $news      = NewsModels::getOne( $id );
        $view      = new Views();
        $view->new = $news;
        $view->display( 'news/newsOne.php' );
    }
    
    public function actionAddForm()
    {
        $view = new Views();
        $view->display( 'news/newsAdd.php' );
    }
    
    public function actionAdd()
    {
        $artical = new NewsModels();
        $artical->title = $_POST['newName'];
        $artical->text = $_POST['newText'];
        $artical->insert();
        $view = new Views();
        $view->redirect( 'index.php?ctrl=news&act=ShowAll' );
    }
    /*
    public function actionShowAll()
    {
        $newsViews  = News::getAll();
        $view       = new Views();
        $view->news = $newsViews;
        $view->display( 'news/newsAll.php' );
    }

    public function actionShowOne()
    {
        $id        = $_GET['id'];
        $newsViews = News::getOne( $id );
        $view      = new Views();
        $view->new = $newsViews;
        $view->display( 'news/newsOne.php' );
    }

    public function actionDel()
    {
        $id        = $_GET['id'];
        $newsViews = News::delOne( $id );
        $view      = new Views();
        $view->redirect( 'index.php?ctrl=news&act=ShowAll' );
    }
    
    public function actionAddForm()
    {
        $view = new Views();
        $view->display( 'news/newsAdd.php' );
    }
    
    public function actionAdd()
    {
        $title = $_POST['newName'];
        $text  = $_POST['newText'];
        News::addOne( $title, $text );
        $view = new Views();
        $view->redirect( 'index.php?ctrl=news&act=ShowAll' );
    }
    
    public function actionUpdateForm()
    {
        $id        = $_GET['id'];
        $newsViews = News::getOne( $id );
        $view      = new Views();
        $view->new = $newsViews;
        $view->display( 'news/newsUpdate.php' );
    }
    
    public function actionUpdate()
    {
        $id    = $_POST['id'];
        $title = $_POST['newName'];
        $text  = $_POST['newText'];
        $t     = News::updateOne( $id, $title, $text );
        $view  = new Views();
        $view->redirect( 'index.php?ctrl=news&act=ShowOne&id='.$id );
    }
    */
}