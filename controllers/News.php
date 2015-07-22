<?php

namespace Aplication\Controllers;

use Aplication\Models\News as NewsModels;
use Aplication\Classes\Views;

class News
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
        $news->save();
        $view = new Views();
        $view->redirect('index.php?ctrl=news&act=ShowOne&id=' . $news->id);
    }

    public function actionUpdateForm()
    {
        $id = $_GET['id'];
        $news = NewsModels::getOneColumn('id', $id);
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
        $news->save();
        $view = new Views();
        $view->redirect('index.php?ctrl=news&act=ShowOne&id=' . $news->id);
    }

    public function actionDel()
    {
        $id = $_GET['id'];
        $news = NewsModels::getOneColumn('id', $id);
        $news->delete();
        $view = new Views();
        $view->redirect('index.php?ctrl=news&act=ShowAll');
    }
}