<?php
header('Content-type:text/html;charset=utf8');
include '../libs/db.php';
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $obj = new unit();
    $obj->model = 'showphoto';
    $str = $obj->cateTree(0,$mysql,'showphoto','0',
        $_GET['cid']);
    include '../templete/admin/updatephoto.html';
}