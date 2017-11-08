<?php
header('Content-type:text/html;charset=utf8');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    include '../libs/db.php';
    include '../libs/function.php';
    $obj = new unit();
    $str = $obj->galleryTable($mysql,'gallery');
    include '../templete/admin/showgallery.html';
}