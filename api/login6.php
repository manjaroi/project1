<?php

	function connect(){
		
		$servername = "localhost";
		$serverAccount = "root";
		$serverPwd = "root";
		$database = "1000phone";

		// 创建连接
		$conn = new mysqli($servername,$serverAccount,$serverPwd,$database);

		// 检测连接
		if ($conn->connect_error) {
			ehco('连接数据库失败');
			return null;
		}
		return $conn;
	};	

	
	$username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : ""; 
	

	// 编写sql语句
	$sql = "select * from user where username = '" . $username . "' and password = '" . $password . "'";
	$db = connect();
	// 定义数组
	$dataset = array();
	if ($db) {
		// 返回一个结果集
		$result = $db -> query($sql);
		while($row = $result->fetch_assoc()){
			$dataset[] = $row;
		}
		//释放内存
		$result->free();
		//关闭连接
		$db->close();

		if (count($dataset) > 0) {
		 	echo "{status:true}";
		}else{
			echo "{status:false,message:'username or password error'}";
		}
		echo json_encode($dataset);
	}

	

?>