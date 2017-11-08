<?php
header('Content-type:text/html;charset=utf8');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // 显示页面 没有下拉时只有这一句
    /*include '../templete/admin/addCategory.html';*/
    // 下拉菜单
    include '../libs/db.php';
    include '../libs/function.php';
    $cate = new unit();
    $str = $cate->cateTree(0,$mysql,'category',0);
    include '../templete/admin/addCategory.html';
}else{
    include '../libs/db.php';
    // 验证
    $pid = $_POST['pid'];
    $cname = $_POST['cname'];
    $templete = $_POST['templete'];
    $file = $_FILES['image1'];
    $src = '';
    if(is_uploaded_file($file['tmp_name'])){
        if(!file_exists('../static/upload')){
            mkdir('../static/upload',0777,true);
        }
        $path = '../static/upload/'.date('Y-m-d',time());

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $imgPath = $path .'/'.$file['name'];
        move_uploaded_file($file['tmp_name'],$imgPath);
        $src = '/skelyfang/program/'. substr($imgPath,3);
        /*echo $src;*/
    }
    $sql = "insert into category (pid,cname,templete,image1) values ('{$pid}','{$cname}','{$templete}','{$src}')";
    $mysql->query($sql);
    // 插入成功的标志是影响了一行
    if($mysql->affected_rows){
        $message = '栏目插入成功';
        $url = 'addCategory.php';
    }else{
        $message = '栏目插入失败';
        $url = 'addCategory.php';
    }

    include 'message.html';


}