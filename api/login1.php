<?php
	$_GET['username'];
	$_GET['password'];
	if($_GET['username']=='a'&&$_GET['password']=='123'){
		echo "登录成功";
	}else{
		echo "登录失败";
	}
?>