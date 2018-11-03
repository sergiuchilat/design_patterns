<?php
function __autoload($classname) {
    $filename = "models/{$classname}.php";
    require_once $filename;
}
?>
<!doctype html>
<html>
    <head></head>
    <body>
    <a href="index.php?page=group">Groups</a>
    <a href="index.php?page=student">Students</a>
    <?
    switch ($_GET['page']){
        case 'group':
            $model = new Group();
            $rows = $model->getDataFromDB();
            break;
        case 'student':
            $model = new Student();
            $rows = $model->getDataFromDB();
            break;
    }
    ?>
    <? if(!empty($_GET['page'])){
        include "pages/{$_GET['page']}.php";
    }?>
    </body>
</html>