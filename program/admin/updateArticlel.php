<?php
// php 代码以HTML的形式在页面中显示;
header('Content-type:text/html;charset=utf8');
include '../libs/db.php';
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    include '../libs/function.php';
    $tid = $_GET['tid'];
    $obj = new unit();
    $obj->model = 'topandmiddle';
    $str = $obj->cateTree('0',$mysql,'category','0',$tid);

    $sql="select * from topandmiddle where tid=$tid";
    $data = $mysql->query($sql)->fetch_assoc();
   /*
    上面两句的写法是注释掉的总述
    只不过在show的HTML页面中由$data['数据库中的名字']变成一下定义的名字
    $name =  $obj->selectOneP($mysql,'topandmiddle',$tid, 'name');
    $shortdes =  $obj->selectOneP($mysql,'topandmiddle',$tid, 'shortdes');
    $name1 =  $obj->selectOneP($mysql,'topandmiddle',$tid, 'name1');
    $longdes =  $obj->selectOneP($mysql,'topandmiddle',$tid, 'longdes');
    $question =  $obj->selectOneP($mysql,'topandmiddle',$tid, 'question');
    $answer =  $obj->selectOneP($mysql,'topandmiddle',$tid, 'answer');
    $name2 =  $obj->selectOneP($mysql,'topandmiddle',$tid, 'name2');
    $img =  $obj->selectOneP($mysql,'topandmiddle',$tid, 'thumb');*/

    include '../templete/admin/updateArticlel.html';
}else{
    // 提交数据
    /* var_dump($_POST);*/
    $tid = $_POST['tid'];
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
        $imgPath = $path .'/'.$file['name'];
        move_uploaded_file($file['tmp_name'],$imgPath);
        $src = '/skelyfang/program/'. substr($imgPath,3);
        /*echo $src;*/
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
    $sql = "update topandmiddle set name='{$name}', shortdes='{$shortdes}',name1='{$name1}', longdes='{$longdes}', question='{$question}', answer='{$answer}',name2='{$name2}', thumb='{$src}',thumb2='{$src2}',thumb3='{$src3}',thumb4='{$src4}',thumb5='{$src5}' where tid='{$tid}'";
    /*echo $sql;
    exit();*/
    $mysql -> query($sql);

    if($mysql->affected_rows){
        $message = '内容修改成功';
        $url = 'showArticlel.php';
    }else{
        $message = '内容修改失败';
        $url = 'addArticlel.php';
    }
    include 'message.html';

}