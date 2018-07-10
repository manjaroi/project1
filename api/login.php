<?php
	$_POST['_user'];
	$_POST['_pass'];
	if($_POST['_user']=='a'&&$_POST['_pass']=='123'){
		echo "登录成功";
	}else{
		echo "登录失败";
	}
?>