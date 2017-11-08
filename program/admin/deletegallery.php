<?php
include '../libs/db.php';
$gid = $_GET['gid'];
// 看是否有子栏目  有子栏目就不允许删除，没有子栏目才允许删除
$sql = "select * from gallery where tid={$gid}";
if($mysql->query($sql)->fetch_assoc()){
    $message = '存在子栏目';
    $url = 'showgallery.php';
    include 'message.html';
    exit();

}
// 没有子栏目直接进行删除
$sql = "delete from gallery where gid={$gid}";
$mysql->query($sql);
if($mysql->affected_rows){
    $message = '删除成功';
    $url = 'showgallery.php';
    include 'message.html';
}