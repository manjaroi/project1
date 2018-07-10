<?php
	
	function conn(){
		$servername = 'localhost:1234';
		$serverAccount = 'root';
		$serverPwd = 'root';
		$database = '1000phone';
		
		$conn = new mysqli($servername,$serverAccount,$serverPwd,$database);

		if ($conn->connect_error) {
			echo('数据库连接错误');
			return null;
		}
		return $conn;

	}

	function exec_sql($sql){
		$conn = conn();
		$result = $conn->query($sql);
		$conn->close();
		return $result;
	}

	function query_sql($sql){
		$conn = conn();
		$result = $conn->query($sql);
		$dataset[] = array();
		while($row = $result->fetch_assoc()){
			$dataset[] = $row;
		}
		$result->free();
		$conn->close();
		return $dataset;
	}

?>