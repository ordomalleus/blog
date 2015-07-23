<?php
function __autoload($class)
{

    if (file_exists(__DIR__ . '/../controllers/' . $class . '.php')) {
        require_once __DIR__ . '/../controllers/' . $class . '.php';
    } elseif (file_exists(__DIR__ . '/../models/' . $class . '.php')) {
        require_once __DIR__ . '/../models/' . $class . '.php';
    } elseif (file_exists(__DIR__ . '/../classes/' . $class . '.php')) {
        require_once __DIR__ . '/../classes/' . $class . '.php';
    } elseif (file_exists(__DIR__ . '/../classes/abstractClass/' . $class . '.php')) {
        require_once __DIR__ . '/../classes/abstractClass/' . $class . '.php';
    } elseif (file_exists(__DIR__ . '/../' . $class . '.php')) {
        require_once __DIR__ . '/../' . $class . '.php';
    } else {
        //Пространства имен
        $classParts = explode('\\', $class);
        $classParts[0] = __DIR__ . '/../';
        $path = implode(DIRECTORY_SEPARATOR, $classParts) . '.php';
        if(file_exists($path)){
            require_once $path;
        }

    }

}