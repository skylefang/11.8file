<?php
header('Content-type:text/html;charset=utf8');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    include '../libs/db.php';
    include '../libs/function.php';
    $obj = new unit();
    $str = $obj->articlelTable($mysql,'topandmiddle');
    include '../templete/admin/showArticlel.html';
}