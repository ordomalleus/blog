<?php

namespace Aplication\Controllers;

use Aplication\Classes\Views;


class home
{
    public function actionIndex()
    {
        $view = new Views();
        $view->display('/../views/index.php');
    }
}