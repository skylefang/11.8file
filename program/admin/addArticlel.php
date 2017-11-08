<?php
header('Content-type:text/html;charset=utf8');
include '../libs/db.php';
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // 展示页面
    /*include '../libs/db.php';*/
    include '../libs/function.php';
    $obj = new unit();
    $str = $obj->cateTree(0,$mysql,'category',0);
    include '../templete/admin/addArticlel.html';
}else{
    // 提交数据
   /* var_dump($_POST);*/
   $cid = $_POST['cid'];
   $name = $_POST['name'];
   $shortdes = $_POST['shortdes'];
   $name1 = $_POST['name1'];
   $longdes = $_POST['longdes'];
   $question = $_POST['question'];
   $answer = $_POST['answer'];
   $name2 = $_POST['name2'];
   $file = $_FILES['img'];
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
    $file2 = $_FILES['img2'];
    $src2 = '';
    if(is_uploaded_file($file2['tmp_name'])){
        if(!file_exists('../static/upload')){
            mkdir('../static/upload',0777,true);
        }
        $path = '../static/upload/'.date('Y-m-d',time());

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $imgPath = $path .'/'.$file2['name'];
        move_uploaded_file($file2['tmp_name'],$imgPath);
        $src2 = '/skelyfang/program/'. substr($imgPath,3);
        /*echo $src;*/
    }
    $file3 = $_FILES['img3'];
    $src3 = '';
    if(is_uploaded_file($file3['tmp_name'])){
        if(!file_exists('../static/upload')){
            mkdir('../static/upload',0777,true);
        }
        $path = '../static/upload/'.date('Y-m-d',time());

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $imgPath = $path .'/'.$file3['name'];
        move_uploaded_file($file3['tmp_name'],$imgPath);
        $src3 = '/skelyfang/program/'. substr($imgPath,3);
        /*echo $src;*/
    }
    $file4 = $_FILES['img4'];
    $src4 = '';
    if(is_uploaded_file($file4['tmp_name'])){
        if(!file_exists('../static/upload')){
            mkdir('../static/upload',0777,true);
        }
        $path = '../static/upload/'.date('Y-m-d',time());

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $imgPath = $path .'/'.$file4['name'];
        move_uploaded_file($file4['tmp_name'],$imgPath);
        $src4 = '/skelyfang/program/'. substr($imgPath,3);
        /*echo $src;*/
    }
    $file5 = $_FILES['img5'];
    $src5 = '';
    if(is_uploaded_file($file5['tmp_name'])){
        if(!file_exists('../static/upload')){
            mkdir('../static/upload',0777,true);
        }
        $path = '../static/upload/'.date('Y-m-d',time());

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $imgPath = $path .'/'.$file5['name'];
        move_uploaded_file($file5['tmp_name'],$imgPath);
        $src5 = '/skelyfang/program/'. substr($imgPath,3);
        /*echo $src;*/
    }
   $sql = "insert into topandmiddle (cid,name,shortdes,name1,longdes,question,answer,name2,thumb,thumb2,thumb3,thumb4,thumb5) values ($cid,'{$name}','{$shortdes}','{$name1}','{$longdes}','{$question}','{$answer}','{$name2}','{$src}','{$src2}','{$src3}','{$src4}','{$src5}')";
   $mysql->query($sql);

   if($mysql->affected_rows){
       $message = '内容插入成功';
       $url = 'showArticlel.php';
}else{
    $message = '内容插入失败';
    $url = 'addArticlel.php';
}
include 'message.html';
}