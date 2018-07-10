<?php 
    //写登录逻辑

    //获取前端传过来参数 => GET
    //参数获取添加空参数判断 isset
    $username = !isset($_GET['username']) ? "" : $_GET['username'];
    $pwd = !isset($_GET['pwd']) ? "" : $_GET['pwd'];
    //连接数据库。用户名和密码进行查询 => waiting 。。。。
    //参数获取 => POST
    $username = !isset($_POST['username']) ? "" : $_POST['username'];
    $pwd = !isset($_POST['pwd']) ? "" : $_POST['pwd'];

    // echo $username;
    if($username == 'lemon' && $pwd == '123456'){
        echo "{status: true}";
    } else {
        echo "{status: false, message: '用户名或密码不正确'}";
    }
?>