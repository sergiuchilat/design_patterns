<?php
require_once 'bootstrap.php';
require_once 'app/app.php';


App::getInstance()->run();

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

    ?>
    <hr>
    <? loadView($module, $action, ['dataForAdd' => $dataForAdd]);?>
    </body>
</html>