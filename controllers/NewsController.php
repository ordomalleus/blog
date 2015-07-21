<?php

class newsController
{

    public function actionShowAll()
    {
        $news = NewsModels::getAll();
        $view = new Views();
        $view->news = $news;
        $view->display('news/newsAll.php');
    }

    public function actionShowOne()
    {
        $id = $_GET['id'];
        $news = NewsModels::getOne($id);
        $view = new Views();
        $view->new = $news;
        $view->display('news/newsOne.php');
    }

    public function actionAddForm()
    {
        $view = new Views();
        $view->display('news/newsAdd.php');
    }

    public function actionAdd()
    {
        $news = new NewsModels();
        $news->title = $_POST['newName'];
        $news->text = $_POST['newText'];
        $news->insert();
        $view = new Views();
        $view->redirect('index.php?ctrl=news&act=ShowOne&id=' . $news->id);
    }

    public function actionUpdateForm()
    {
        $news = new NewsModels();
        $id = $_GET['id'];
        $news = $news::getOneColumn('id', $id);
        $view = new Views();
        $view->new = $news;
        $view->display('news/newsUpdate.php');
    }

    public function actionUpdate()
    {
        $id = $_POST['id'];
        $news = NewsModels::getOneColumn('id', $id);
        $news->title = $_POST['newName'];
        $news->text = $_POST['newText'];
        $news->update();
        var_dump($news->update());die;
        $view = new Views();
        $view->redirect('index.php?ctrl=news&act=ShowOne&id=' . $news->id);
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