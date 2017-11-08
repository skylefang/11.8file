<?php

/*var_dump($_FILES['img']);*/

// $_FILES 接收前台发来的文件
$file = $_FILES['img'];
/*var_dump($file);
exit;*/
/*D:\wamp64\www\skelyfang\program\demo\index.php:6:
array (size=5)
  'name' => string '2.jpg' (length=5)         图片本身名字
  'type' => string 'image/jpeg' (length=10)   类型
  'tmp_name' => string 'D:\wamp64\tmp\phpDEB3.tmp' (length=25)    图片路径
  'error' => int 0
  'size' => int 176270    图片大小*/
// 判断某文件是否为上传文件；
if(is_uploaded_file($_FILES['img']['tmp_name'])){
    // 判断是否有upload文件夹，没有的话创建一个
    if(!file_exists('upload')){
        mkdir('upload');
    }
    
    $path = 'upload/' .date('Y-m-d');
    if(!file_exists($path)){
       mkdir($path);
    }
    $imgPath = $path .'/' .$file['name'];
    $src = '/skelyfang/program/demo/' .$imgPath;
    // 移动图片路径，将原来的图片路径换成自己拼接好的路径
    move_uploaded_file($file['tmp_name'],$imgPath);
    // 在页面中展示图片
    echo "<img src='{$src}'/>";
}


/*echo time();   时间差
date('Y-m-d');*/