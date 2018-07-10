<?php
// 拿到数据
$servername = "localhost";
// 账户
$username = "hemao";
// 密码
$password = "123";
// 数据库名字
$dbname = "brain";

// 创建连接
$conn = new mysqli($servername,$username,$password,$dbname);
// var_dump($conn);
// 检测连接
// 如果连接失败直接退出数据库连接
if($conn->connect_error){
	die("连接失败:".$conn->connect_error);
}
// 查询前设置编码,防止输出乱码
$conn->set_charset('utf8');
// echo "连接成功";
?>