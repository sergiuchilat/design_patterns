<?php
require_once 'models/group.php';
require_once 'models/student.php';
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