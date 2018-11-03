<?php
class App{
    private static $instance = null;
    public static $module = null;
    public static $action = null;

    public static function getInstance(){
        if(self::$instance === null)
            self::$instance = new self();
        return self::$instance;
    }

    public static function run(){
        $controllerName  = ucfirst(self::$module) . 'Controller';

        $controller = new $controllerName();
        $controller->actionList();
    }

    public static function route(){
        self::$module = $_GET['module'];
        self::$action = $_GET['action'] ?: 'list';
    }
}