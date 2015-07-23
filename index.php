<?php

error_reporting(E_ALL);

require_once __DIR__ . '/autoload/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'home';
$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'Index';

$controllerClassName = 'Aplication\\Controllers\\' . $ctrl;

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




































/*
error_reporting(E_ALL);

require_once __DIR__ . '/autoload/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'home';
$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'Index';

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
}
*/