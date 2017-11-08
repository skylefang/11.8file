<?php
header('Content-type:text/html;charset=utf8');
include '../libs/db.php';
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    include '../libs/function.php';
    $obj = new unit();
    $str = $obj->cateTree(0,$mysql,'category',0);

    include '../templete/admin/addgallery.html';
}else{
    $tid = $_POST['tid'];
    $gname = $_POST['gname'];
    $gtable = $_POST['gtable'];
    $file = $_FILES['gphoto'];
    $src = '';
    if(is_uploaded_file($file['tmp_name'])){
        if(!file_exists('../static/upload')){
            mkdir('../static/upload',0777,true);
        }
        $path = '../static/upload/'.date('Y-m-d',time());

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $imgPath = $path.'/'.$file['name'];
        move_uploaded_file($file['tmp_name'],$imgPath);
        $src = '/skelyfang/program/'. substr($imgPath,3);
    }
    $sql = "insert into gallery (tid,gname,gtable,gphoto) values ($tid,'{$gname}','{$gtable}','{$src}')";
    $mysql->query($sql);

    if($mysql->affected_rows){
        $message = '内容插入成功';
        $url = 'showgallery.php';
    }else{
        $message = '内容插入失败';
        $url = 'addgallery.php';
    }
    include 'message.html';
}