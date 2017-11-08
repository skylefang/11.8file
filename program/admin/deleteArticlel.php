<?php
include '../libs/db.php';
$tid = $_GET['tid'];
/*$sql = "select * from topandmiddle where cid={$tid}";
if($mysql->query($sql)->fetch_assoc()){
    $message = '存在子栏目';
    $url = 'showArticlel.php';
    include 'message.html';
    exit();

}*/
$sql ="delete from topandmiddle where tid={$tid}";
$mysql->query($sql);
if($mysql->affected_rows){
    $message = '删除成功';
    $url = 'showArticlel.php';
    include 'message.html';
}