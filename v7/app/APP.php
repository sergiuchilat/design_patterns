<?php
class APP{
    /*Link to APP instance*/
    private static $instance = null;
    /*APP Module Ex : module*/
    public static $module = null;
    /*APP action*/
    public static $action = null;
    /*Module name(ucfirst) Ex: Module*/
    public static $moduleName = null;
    /*Controller name*/
    public static $controllerName = null;

    /** Generate singleton instance
     * @return APP|null
     */
    public static function getInstance(){
        if(self::$instance === null)
            self::$instance = new self();
        return self::$instance;
    }

    /**
     * APP run
     */
    public static function run(){
        $classRegister = [];
        /*Connect class register*/
        require_once 'class_register.php';
        /*Extract $model and $action from REQUEST*/
        self::route();
        /*Generate $controller and $module names*/
        self::$controllerName = ucfirst(self::$module) . "Controller";
        self::$moduleName = ucfirst(self::$module);

        /*Connect controller file*/
        if(file_exists($classRegister[self::$controllerName])){
            require_once $classRegister[self::$controllerName];
            if (!class_exists(self::$controllerName)){
                die('Internal Error: Class not exists');
            }
        }else{
            die('Internal Error: Controller not exists');
        }

        /*Connect model file*/
        if(file_exists($classRegister[self::$moduleName])){
            require_once $classRegister[self::$moduleName];
            if (!class_exists(self::$moduleName)){
                die('Internal Error: Class not exists');
            }
        }else{
            die('Internal Error: Model not exists');
        }

        /*Create controller instance*/
        $controller = new self::$controllerName();
        /*Generate reflection method name*/
        $actionName = "action" . self::$action;
        /*Run controller action*/
        $pageContent = $controller->$actionName();
        /*Load layout and pass $pageContent block*/
        self::loadLayout($pageContent);

    }

    /** Load layout
     * @param $pageContent - page content
     */
    public static function loadLayout($pageContent){
        include 'layouts/main.php';
    }

    /** Load view and generate HTML code
     * @param $module - module
     * @param $action - action
     * @param $data - model data
     * @return string HTML code
     */
    public static function loadView($path, $data){
        /*Start buffering*/
        ob_start();
        /*Extract variables from $data array*/
        extract($data);
        /*load $view file*/
        if(!empty($path)){
            include "views/{$path}.php";
        }else {
            include 'views/404.php';
        }
        /*Get buffer content*/
        $viewContent = ob_get_contents();
        /*Close buffer*/
        ob_end_clean();
        /*Return view HTML code*/
        return $viewContent;
    }

    /**
     * Routing - extract module and action from REQUEST
     */
    public static function route(){
        self::$module = $_GET['module'];
        self::$action = $_GET['action'] ?: 'list';
    }
}