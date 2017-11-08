<?php
header('Content-type:text/html;charset=utf8');
include '../libs/db.php';
include 'header.php';
/*$cid=$_GET['cid'];*/
$sql = "select * from category order by cid ASC limit 2,4";
$data1= $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
$sql1 = "select * from topandmiddle where tid=41";
$list3 = $mysql->query($sql1)->fetch_assoc();
$sql2 = "select * from topandmiddle where tid=42";
$list4 = $mysql->query($sql2)->fetch_assoc();
include '../templete/index/index.html';
include 'footer.php';
