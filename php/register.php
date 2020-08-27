<?php
    header('content-type:text/html;charset=utf-8;');
    $un = $_REQUEST['username'];
    $pw = $_REQUEST['password'];

    //连接数据库进行查询
    $conn = mysqli_connect('localhost','root','root','user');
    $res = mysqli_query($conn,"SELECT * FROM `xiaomi` WHERE `username` = $un");
    $row = mysqli_fetch_assoc($res);
    

    //能查询到结果的话说明手机号码已经被注册，返回1
    if($row){
        echo 1;
    }
    //查询不到结果说明可以正常注册，插入数据到到数据库中
    else{
        $sql = "INSERT INTO `xiaomi` (`username`,`password`) VALUES ($un,$pw)";
        $res = mysqli_query($conn,$sql);
        echo 0;
    }

    mysqli_close($conn);
?>