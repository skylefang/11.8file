<?php
header('Content-type:text/html;charset=utf8');
include '../libs/db.php';
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    include '../libs/function.php';
    $gid = $_GET['gid'];
    $obj = new unit();
    $obj->model = 'gallery';
    $str = $obj->cateTree('1',$mysql,'gallery','0',$gid);

    $sql="select * from gallery where gid=$gid";
    $data1 = $mysql->query($sql)->fetch_assoc();

    include '../templete/admin/updategallery.html';
}