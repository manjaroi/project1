<?php

	$server = "localhost:1234";
	$account = "root";
	$pwd = "root";
	$db = "1000phone";

	$conn = new mysqli($server,$account,$pwd,$db);

	if ($conn->connect_error) {
		# code...
		echo "{status:false,message:'连接错误'}";
	}else{
		$sql = "select * from students";

		$result = $conn->query($sql);

		$dataset = array();

		while ($row = $result->fetch_assoc()) {
			# code...
			$dataset[] = $row;
		}

		$result->free();
		$conn->close();

		$data = json_encode($dataset);

		echo "{status:true,data:$data}";
	}



?>	