<?php
include '../libs/db.php';
$sql = "select * from category where pid=0";
$nav = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
include '../templete/index/header.html';