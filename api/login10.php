<?php
	include 'dbhelper.php';

	$username = !isset($_POST['username']) ? "" : $_POST['username'];
	$pwd = !isset($_POST['password']) ? "" : $_POST['password'];

	$sql = "select * from user where username = '" . $username . "' and password = '" . $pwd . "'";


	$result = query_sql($sql);
	
	
	if(count($result) > 0){
        echo "{status: true}";
    } else {
    	echo "{status: false, message: 'username or password error'}";
    }

?>