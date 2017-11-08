<?php
header('Content-type:text/html;charset=utf8');
include '../libs/db.php';
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    /*include '../libs/function.php';*/
    include '../libs/function.php';
    $obj = new unit();
    $str = $obj->photoTree(7,$mysql,'gallery',0);
    include '../templete/admin/addphoto.html';
}else{
    $gid = $_POST['gid'];
    $showtable = $_POST['showtable'];
    $file1 = $_FILES['img1'];
    $src1 = '';
    if(is_uploaded_file($file1['tmp_name'])){
        if(!file_exists('../static/upload')){
            mkdir('../static/upload',0777,true);
        }
        $path = '../static/upload/'.date('Y-m-d',time());

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $imgPath = $path.'/'.$file1['name'];
        move_uploaded_file($file1['tmp_name'],$imgPath);
        $src1 = '/skelyfang/program/'. substr($imgPath,3);
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

    $file6 = $_FILES['img6'];
    $src6 = '';
    if(is_uploaded_file($file6['tmp_name'])){
        if(!file_exists('../static/upload')){
            mkdir('../static/upload',0777,true);
        }
        $path = '../static/upload/'.date('Y-m-d',time());

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $imgPath = $path .'/'.$file6['name'];
        move_uploaded_file($file6['tmp_name'],$imgPath);
        $src6 = '/skelyfang/program/'. substr($imgPath,3);
        /*echo $src;*/
    }

    $file7 = $_FILES['img7'];
    $src7 = '';
    if(is_uploaded_file($file7['tmp_name'])){
        if(!file_exists('../static/upload')){
            mkdir('../static/upload',0777,true);
        }
        $path = '../static/upload/'.date('Y-m-d',time());

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $imgPath = $path .'/'.$file7['name'];
        move_uploaded_file($file7['tmp_name'],$imgPath);
        $src7 = '/skelyfang/program/'. substr($imgPath,3);
        /*echo $src;*/
    }

    $file8 = $_FILES['img8'];
    $src8 = '';
    if(is_uploaded_file($file8['tmp_name'])){
        if(!file_exists('../static/upload')){
            mkdir('../static/upload',0777,true);
        }
        $path = '../static/upload/'.date('Y-m-d',time());

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $imgPath = $path .'/'.$file8['name'];
        move_uploaded_file($file8['tmp_name'],$imgPath);
        $src8 = '/skelyfang/program/'. substr($imgPath,3);
        /*echo $src;*/
    }

    $file9 = $_FILES['img9'];
    $src9 = '';
    if(is_uploaded_file($file9['tmp_name'])){
        if(!file_exists('../static/upload')){
            mkdir('../static/upload',0777,true);
        }
        $path = '../static/upload/'.date('Y-m-d',time());

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $imgPath = $path .'/'.$file9['name'];
        move_uploaded_file($file9['tmp_name'],$imgPath);
        $src9 = '/skelyfang/program/'. substr($imgPath,3);
        /*echo $src;*/
    }

    $sql = "insert into showphoto (gid,thumb1,thumb2,thumb3,thumb4,thumb5,thumb6,thumb7,thumb8,thumb9,showtable) values ('{$gid}','{$src1}','{$src2}','{$src3}','{$src4}','{$src5}','{$src6}','{$src7}','{$src8}','{$src9}','{$showtable}')";
    $mysql->query($sql);

    if($mysql->affected_rows){
        $message = '内容插入成功';
        $url = 'showphoto.php';
    }else{
        $message = '内容插入失败';
        $url = 'addphoto.php';
    }
    include 'message.html';

}