<?php
function __autoload($classname) {
    $filename = "models/{$classname}.php";
    if(!file_exists($filename)){
        die('Internal Error');
    }
    require_once $filename;
    if (!class_exists(ucfirst($classname))){
        die('Internal Error');
    }
}
?>
<!doctype html>
<html>
    <head></head>
    <body>
    <a href="index.php?module=group&action=list">Groups list</a>
    <a href="index.php?module=group&action=add">Add Groups</a>
    <hr>
    <a href="index.php?module=student">Students list</a>
    <a href="index.php?module=student&action=add">Add Student</a>
    <?

    $module = $_GET['module'];
    $action = $_GET['action'] ?: 'list';

    $modelName = ucfirst($module);

    $model = new $modelName();
    $rows = $model->getDataFromDB();

    ?>
    <hr>
    <? if(!empty($_GET['module'])){
        include "views/{$module}/{$action}.php";
    }else {
        include 'views/404.php';
    }?>
    </body>
</html>