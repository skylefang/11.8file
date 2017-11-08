<?php
include '../libs/db.php';
include 'header.php';
$sid=$_GET['sid'];

$sql = "select * from showphoto where sid=$sid";
$data1 = $mysql->query($sql)->fetch_assoc();
$showtable = $data1['showtable'];
include '../templete/index/'.$showtable;
include 'footer.php';