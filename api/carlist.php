<?php
require("connect.php");
$price = $_POST['price'];
$goodsname = $_POST['goodsname'];

$sql = "SELECT * FROM `goodslist` WHERE goodsname = '$goodsname'";
$result = $conn -> query($sql);
$row = $result -> fetch_all(MYSQLI_ASSOC);
if($row){
	// $conn->set_charset('utf8');
	echo "已有此商品";
}else{
	$sql = "INSERT INTO `goodslist`(`price`, `goodsname`) VALUES ('$price','$goodsname')";
	$conn -> query($sql);
	echo "添加成功";
}
$conn->set_charset('utf8');

?>

