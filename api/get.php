<?php
	$serverName = "localhost:1234";
	$username = "root";
	$password = "root";
	$dbName = "1000phone";
	// echo "haha ..."
	$conn = new mysqli($serverName,$username,$password,$dbName);

	if($conn -> connect_error){
		echo '数据库连接失败！';
	}
	
	$conn->set_charset("utf8");
	$sql = "select * from user";
	$res = $conn->query($sql);
	$row = $res->fetch_all(MYSQLI_ASSOC);
	var_dump($row);	
?>