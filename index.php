<?php

error_reporting(E_ALL);

require_once __DIR__ . '/autoload/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[2]) ? $pathParts[2] : 'home';
$act = !empty($pathParts[3]) ? $pathParts[3] : 'Index';

$controllerClassName = $ctrl . 'Controller';

$method = 'action' . $act;

//ловим 404 ошибку
try {
    $controller = new $controllerClassName;
    $controller->$method();
} catch (ModelException $exc) {
    $controller = new ErrorController();
    $controller->action404($exc);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once __DIR__ . '/autoload/autoload.php';

    $ctrl = isset($_POST['ctrl']) ? $_POST['ctrl'] : 'home';
    $act = isset($_POST['act']) ? $_POST['act'] : 'Index';

    $controllerClassName = $ctrl . 'Controller';

    $method = 'action' . $act;

    //ловим 404 ошибку
    try {
        $controller = new $controllerClassName;
        $controller->$method();
    } catch (ModelException $exc) {
        $controller = new ErorController();
        $controller->action404($exc);
    }


/*
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'home';
$act = isset($_GET['act']) ? $_GET['act'] : 'Index';

$controllerClassName = $ctrl . 'Controller';

$method = 'action' . $act;

//ловим 404 ошибку
try {
    $controller = new $controllerClassName;
    $controller->$method();
} catch (ModelException $exc) {
    $controller = new ErrorController();
    $controller->action404($exc);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once __DIR__ . '/autoload/autoload.php';

    $ctrl = isset($_POST['ctrl']) ? $_POST['ctrl'] : 'home';
    $act = isset($_POST['act']) ? $_POST['act'] : 'Index';

    $controllerClassName = $ctrl . 'Controller';

    $method = 'action' . $act;

    //ловим 404 ошибку
    try {
        $controller = new $controllerClassName;
        $controller->$method();
    } catch (ModelException $exc) {
        $controller = new ErorController();
        $controller->action404($exc);
    }*/
}