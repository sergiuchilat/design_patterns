<?php
class App{
    private static $instance = null;
    public static $module = null;
    public static $action = null;
    public static $moduleName = null;
    public static $controllerName = null;

    public static function getInstance(){
        if(self::$instance === null)
            self::$instance = new self();
        return self::$instance;
    }

    public static function run(){
        $classRegister = [];
        require_once 'class_register.php';
        self::route();
        self::$controllerName = ucfirst(self::$module) . "Controller";
        self::$moduleName = ucfirst(self::$module);

        if(file_exists($classRegister[self::$controllerName])){
            require_once $classRegister[self::$controllerName];
            if (!class_exists(self::$controllerName)){
                die('Internal Error: Class not exists');
            }
        }else{
            die('Internal Error: Controller not exists');
        }

        if(file_exists($classRegister[self::$moduleName])){
            require_once $classRegister[self::$moduleName];
            if (!class_exists(self::$moduleName)){
                die('Internal Error: Class not exists');
            }
        }else{
            die('Internal Error: Model not exists');
        }

        $controller = new self::$controllerName();
        $actionName = "action" . self::$action;
        $controller->$actionName();

    }

    public static function loadView($module, $action, $data){
        extract($data);
        if(!empty($module)){
            include "views/{$module}/{$action}.php";
        }else {
            include 'views/404.php';
        }
    }

    public static function route(){
        self::$module = $_GET['module'];
        self::$action = $_GET['action'] ?: 'list';
    }
}