<?php
class unit{
    // 两个_
    function __construct()
    {
       $this->str='';
       // 把父级id当做了属性
       $this->parentid = null;
       $this->model = '';
    }
    /* 栏目数
     * cateTree($pid,$db,$table,$flag) 对应
     * cateTree(0,$mysql,'category',0)
     * $pid:父栏目  0是整个网站的栏目数
     * $db：数据库叫做资源，用来获取数据  $mysql是资源
     * $table：表名
     * $flag：规定子栏目，用来指明是谁的子栏目 标记
     * function cateTree 用来创建栏目数
     * */
    // 创建栏目数
    function cateTree($pid,$db,$table,$flag,$current=null){
        $flag++;
        // 如果current有值
        if($current && $this->model == 'category'){
//            $sql = "select * from {$table} where cid={$current}";
            $sql = "select pid from $this->model where cid=$current";
            /*$sql = "select pid from {$table} where cid={$current}";*/
            $data = $db->query($sql)->fetch_assoc();
            $this->parentid = $data['pid'];
        }else if($current && $this->model != 'category'){
            $sql = "select cid from $this->model where tid=$current";
            $data = $db->query($sql)->fetch_assoc();
            $this->parentid = $data['cid'];
        }

        // 查询  {$table}  与  $table 效果相同 {} 写上也不会显示
        $sql = "select * from {$table} where pid={$pid}";
        $result = $db->query($sql);

        while($row = $result->fetch_assoc()){
            // str_repeat() 是函数 php是面向过程化的语言 传两个参数，重复什么，谁重复
            // 也可写<option value='{$row['cid']}'>$flag{$row['cname']}</option> 是数字
            $heng = str_repeat('-',$flag);

            // 当前栏目的父级id，变成选中状态  selected使选中
            if($row['cid'] == $this->parentid){
                $this->str .="
                   <option value='{$row['cid']}' selected>{$heng}{$row['cname']}</option>
                  ";
            }else{
                $this->str .="            
            <option value='{$row['cid']}'>{$heng}{$row['cname']}</option>
            ";
            }
            // 递归
            $this->cateTree($row['cid'],$db,$table,$flag,$current=null);
        }
        return $this->str;
    }

    // 创建表
    function cateTable($db,$table){
        $sql = "select * from $table";
        $data = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
        for($i=0;$i<count($data);$i++){
            $this->str .="
            <tr>
                <td>{$data[$i]['cid']}</td>
                <td>{$data[$i]['cname']}</td>
                <td>{$data[$i]['pid']}</td>
                <td>{$data[$i]['templete']}</td>
                <td><img src='{$data[$i]['image1']}' alt='' width='100' height='100'></td>
                <td>
                   <a href=\"deleteCategory.php?cid={$data[$i]['cid']}\" 
                   class=\"btn\">删除</a>
                   <a href=\"updateCategory.php?cid={$data[$i]['cid']}\" 
                   class=\"btn btnAdd\">修改</a>
                </td>
            </tr>
            ";
        }
        return $this->str;
    }


    /*function artiTree(){

    }*/
    // 选择一个进行修改
    function selectOne($db,$table,$id,$attr){
        $sql = "select $attr from $table where cid='$id'";
        $data = $db->query($sql)->fetch_assoc();
        $cname = $data[$attr];
        return $cname;
    }

    function articlelTable($db,$table){
        $sql = "select * from $table";
        $data = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
        for($i=0;$i<count($data);$i++){
            $this->str .="
            <tr>
                <td>{$data[$i]['tid']}</td>
                <td>{$data[$i]['name']}</td>
                <td>{$data[$i]['shortdes']}</td>
                <td><img src='{$data[$i]['thumb']}' alt='' width='100' height='80'></td>
                <td>{$data[$i]['name1']}</td>
                <td>{$data[$i]['longdes']}</td>
                <td>{$data[$i]['question']}</td>                
                <td>{$data[$i]['answer']}</td>
                <td>{$data[$i]['name2']}</td>
                <td><img src='{$data[$i]['thumb2']}' alt='' width='100' height='80'></td>
                <td><img src='{$data[$i]['thumb3']}' alt='' width='100' height='80'></td>
                <td><img src='{$data[$i]['thumb4']}' alt='' width='100' height='80'></td>
                <td><img src='{$data[$i]['thumb5']}' alt='' width='100' height='80'></td>
                <td>{$data[$i]['cid']}</td>
                <td>
                   <a href=\"deleteArticlel.php?tid={$data[$i]['tid']}\" 
                   class=\"btn\">删除</a>
                   <a href=\"updateArticlel.php?tid={$data[$i]['tid']}\" 
                   class=\"btn btnAdd\">修改</a>
                </td>
            </tr>
            ";
        }
        return $this->str;
    }
    function selectOneP($db,$table,$id,$attr){
        $sql = "select $attr from $table where tid={$id}";
        $result = $db->query($sql)->fetch_assoc();
        $cname = $result[$attr];
        return $cname;
    }

    function galleryTable($db,$table){
        $sql = "select * from $table";
        $data = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
        for($i=0;$i<count($data);$i++){
            $this->str .="
                 <tr>
                     <td>{$data[$i]['gid']}</td>
                     <td>{$data[$i]['gname']}</td>
                     <td><img src='{$data[$i]['gphoto']}' alt='' width='100' height='100'></td>
                     <td>{$data[$i]['gtable']}</td>
                     <td>{$data[$i]['tid']}</td>
                     <td>
                         <a href=\"deletegallery.php?gid={$data[$i]['gid']}\" class=\"btn\">删除</a>
                         <a href=\"updategallery.php?gid={$data[$i]['gid']}\" class=\"btn btnAdd\">修改</a>
                     </td>                
                 </tr>
               
               
               ";
        }
        return $this->str;
    }
    function photoTable($db,$table){
        $sql = "select * from $table";
        $data = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
        for($i=0;$i<count($data);$i++){
            $this->str .="
                 <tr>
                     <td>{$data[$i]['sid']}</td>
                     <td><img src='{$data[$i]['thumb1']}' alt='' width='100' height='80'></td>
                     <td><img src='{$data[$i]['thumb2']}' alt='' width='100' height='80'></td>
                     <td><img src='{$data[$i]['thumb3']}' alt='' width='100' height='80'></td>
                     <td><img src='{$data[$i]['thumb4']}' alt='' width='100' height='80'></td>
                     <td><img src='{$data[$i]['thumb5']}' alt='' width='100' height='80'></td>
                     <td><img src='{$data[$i]['thumb6']}' alt='' width='100' height='80'></td>
                     <td><img src='{$data[$i]['thumb7']}' alt='' width='100' height='80'></td>
                     <td><img src='{$data[$i]['thumb8']}' alt='' width='100' height='80'></td>
                     <td><img src='{$data[$i]['thumb9']}' alt='' width='100' height='80'></td>
                     <td>{$data[$i]['gid']}</td>
                     <td>{$data[$i]['showtable']}</td>
                     <td>
                         <a href=\"deletephoto.php?sid={$data[$i]['sid']}\" class=\"btn\">删除</a>
                         <a href=\"updatephoto.php?sid={$data[$i]['sid']}\" class=\"btn btnAdd\">修改</a>
                     </td>                
                 </tr>
               
               
               ";
        }
        return $this->str;
    }

    function photoTree($tid,$db,$table){
        $sql = "select * from $table where tid = $tid";
        $result1 = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
        for($i=0;$i<count($result1);$i++){
            $this->str .="
                   <option value='{$result1[$i]['gid']}' selected>{$result1[$i]['gname']}</option>
                  ";
        }
         return $this->str;
    }

}
