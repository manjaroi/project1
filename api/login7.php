<?php 


    function connect(){
        $servername = "localhost"; // 数据库的主机
        $serverAccount = "root"; // 登录数据库的用户名
        $serverPwd = "root"; // 登录数据库的密码
        $database = "1000phone"; // 要连接的数据库
    
        //连接数据库，mysqli 是 php 自带的连接驱动
        // $conn 是一个连接实例（对象）, connect_error
        //$conn->connect_error
        //卡顿 1ms
        $conn = new mysqli($servername, $serverAccount, $serverPwd, $database);
        //判断是否连接出错
        if($conn->connect_error){
            echo('连接数据库错误');
            return null;
        }
        return $conn;
    }

    //接收前端 post 请求的参数
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : "";    
    $sql = "select * from user where username = '" . $username . "' and password = '" . $password . "'";
    $db = connect();
    //定义数组
    $dataset = array();
    if($db){
        //query 方法是执行 sql 语句并返一个结果集
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()){
            //$dataset.push($row)
            $dataset[] = $row;
        }
        $result->free(); //释放内存
        $db->close(); //关闭连接

        if(count($dataset) > 0){
            echo "{status: true}";
        } else {
            echo "{status: false, message: 'username or password error'}";
        }
        //数组转换成字符串
        // echo json_encode($dataset);
    }

    /*
        1、PHP 连接 MySQL 使用 new mysqli(servername, username, password, database);
        2、执行 SQL 语句是用 $conn->query($sql); => select
        3、循环结果集当中的结果 $row 并存放到数组当中, $dataset[] = $row;
        4、通过数据长度来判断是否登录成功 count($dataset)
        5、PHP 对象操作：属性是通过 -> $conn->connect_error
        6、结果集操作成功要手动释放 $result->free();
        7、数据库操作完成要手动关闭 $db->close()
    */
?>