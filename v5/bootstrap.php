<?php



function __autoload($className) {
    $filenameModel = "models/{$className}.php";
    $filenameController = "controllers/{$className}.php";

    echo $filenameController;
    if(file_exists($filenameController)){
        require_once $filenameController;
    }else{
        die('Internal Error: Controller not exists');
    }

    $filenameModel = str_replace('Controller', '', $filenameModel);

    if(file_exists($filenameModel)){
        require_once $filenameModel;
    }else{
        die('Internal Error: Model not exists');
    }

    if (!class_exists(ucfirst($className))){
        die('Internal Error');
    }
}

function loadView($module, $action, $data){
    extract($data);
    if(!empty($module)){
        include "views/{$module}/{$action}.php";
    }else {
        include 'views/404.php';
    }
}