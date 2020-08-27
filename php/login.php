<?php
    header('content-type:text/html;charset=utf-8;');
    $un = $_REQUEST['username'];
    $pw = $_REQUEST['password'];

    // 连接服务器查询
    $conn = mysqli_connect('localhost','root','root','user');
    $sql = "SELECT * FROM `xiaomi` WHERE `username`=$un AND `password`=$pw";
    $res = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($res);
    // mysqli_close($conn);

    if($data){
        $arr = array('code'=>1,'data'=>array('username'=>$un));
    }else{
        $arr = array('code'=>0,'msg'=>'用户名或密码错误');
    }

    //返回json格式的数据
    echo json_encode($arr);
?>