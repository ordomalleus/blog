<?php

namespace Aplication\Controllers;


class home
{
    public function actionIndex()
    {
        $view = new \Views();
        $view->display('/../views/index.php');
    }
}