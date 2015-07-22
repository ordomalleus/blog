<?php

class homeController
{
    public function actionIndex()
    {
        $view = new Views();
        $view->display('/../views/index.php');
    }
}