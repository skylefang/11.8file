<?php
include '../libs/db.php';
$sid=$_GET['sid'];
$sql ="delete from showphoto where sid={$sid}";
$mysql->query($sql);
if($mysql->affected_rows){
    $message = '删除成功';
    $url = 'showphoto.php';
    include 'message.html';
}