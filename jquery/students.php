<?php 

	include 'dbhelper.php';
	$sql = 'select * from students';
	$result = query_sql($sql);	
	$lists = json_encode($result);
	echo "{status: true, data: $lists}";
?>