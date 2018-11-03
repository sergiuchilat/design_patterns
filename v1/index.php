<?php
require_once 'model.php';
?>
<!doctype html>
<html>
    <head></head>
    <body>
    <a href="index.php?page=names">Names</a>
    <a href="index.php?page=names_ordered">Names ordered</a>
    <?
    $rows = getDataFromDB();
    ?>
    <? if(!empty($_GET['page'])){
        include "pages/{$_GET['page']}.php";
    }?>
    </body>
</html>