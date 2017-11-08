<?php
// session使用时先开启
session_start();
if(!isset($_SESSION['islogin'])){
    $message = '请登录';
    $url = 'login.php';
    include 'message.html';
    exit();
}