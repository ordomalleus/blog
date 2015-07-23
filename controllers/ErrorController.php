<?php

use Aplication\Classes\Views;


class ErrorController
{
    public function action404($exc)
    {
        $view = new Views();
        $view->exc = $exc->getMessage();
        $view->display('404.php');
    }

}