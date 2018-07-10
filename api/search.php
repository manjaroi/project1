<?php
// 得到$conn对象
require("connect.php");
// 得到sql语句(select)
$sql = "SELECT * FROM `orange` WHERE 1";
// 利用conn的query方法接收sql
$result = $conn->query($sql);
// var_dump($result);
// 把$result输出成一种看得懂的格式
$row = $result->fetch_all(MYSQLI_ASSOC);
// var_dump($row);
// 释放查询结果集避免资源浪费
$result->close();
// 关闭数据库避免资源浪费
$conn->close();
echo json_encode($row);
?>