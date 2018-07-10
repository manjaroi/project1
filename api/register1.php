<?php

	include 'dbhelper.php';

	$username = !isset($_POST['username']) ? "" : $_POST['username'];
	$pwd = !isset($_POST['password']) ? "" : $_POST['password'];

	$sql = "insert into user(username,password) values('$username','$pwd')";

	$result = exec_sql($sql);
	if ($result) {
		echo "{status:true}";
	}else{
		echo "{status: false, message: '注册失败'}";
	};
?>