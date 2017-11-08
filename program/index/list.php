<?php
include '../libs/db.php';
include 'header.php';
$cid=$_GET['cid'];

$sql = "select templete from category where cid=$cid";
$data = $mysql->query($sql)->fetch_assoc();

/*$sql = "select templete from category where cid=$cid";
$data = $mysql->query($sql)->fetch_assoc();*/

// 找到栏目模版
$templete = $data['templete'];
// 名称
/*$cname = $data['cname'];*/
// 找到当前栏目所对应的文章
$sql = "select * from topandmiddle where cid=$cid";
$list = $mysql->query($sql)->fetch_assoc();

/*$temp = $data1['templete'];*/

/*图集中整屏图集*/
/*$sql = "select * from gallery";
$list2 = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);*/

/*分页图集
  总数   $totle
  每页个数   $num
  页数   ceil($totle/$num)
  页码   $_GET['page']
  $offset = ($page-1)*$num
  limit $offset,$num
*/
/*设置默认页码*/
$page = isset($_GET['page'])?$_GET['page']:1;
$num = 4;
$totle = $mysql->query("select count(*) as totle from gallery where tid=$cid")->fetch_assoc()['totle'];
$pages = ceil($totle/$num);
$offset = ($page-1)*$num;
$sql = "select * from gallery order by gid ASC limit $offset,4";
$list2 = $mysql->query($sql)->fetch_all(1);

include '../templete/index/'.$templete;
include 'footer.php';