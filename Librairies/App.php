<?php

namespace Librairies;

class App
{
    public static function run()
    {
        $controller = 'Patient';

        if (isset($_GET['controller'])) {
            $controller = $_GET['controller'];
        }

        $task = 'index';
        if (!empty($_GET['task'])) {
            $task = $_GET['task'];
        }
        $controllerName = '\Controller\\' . $controller;
        $controller = new $controllerName();
        $controller->$task();
    }
}
