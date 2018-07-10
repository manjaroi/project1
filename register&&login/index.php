<?php
    session_start();

    //判断是否有登录信息
    if(!isset($_SESSION['user'])){
        header("Location: login.html");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.css">
    <script src="../js/ajax.js"></script>
    <title>学生管理系统</title>
</head>
<body>
    <a href="logout.php">退出登录</a>
    <script>
        $.ajax({
            api: 'students.php',
            success: function(res){
                // window.eval("({name: 'Tom'})")
                // let str = "{name: 'Tom'}"
                // JSON.parse(str)
                // window.eval("(" + str + ")")
                var data = window.eval('(' + res + ')');
                if(data.status){
                    generateTable(data.data);
                }
            }
        })

        function generateTable(data){   
            var table = document.createElement('table');
            table.className = 'table';
            var thead = document.createElement('thead');
            var tr = document.createElement('tr');
            var cols = ['name', 'gender', 'age', 'phone', 'address'];
            for(var i = 0; i < cols.length; i++){
                var th = document.createElement('th');
                th.innerText = cols[i];
                tr.appendChild(th);
            }
            thead.appendChild(tr);
            table.appendChild(thead);


            var tbody = document.createElement('tbody');
            for(var i = 0; i < data.length; i++){
                tr = document.createElement('tr');
                for(var j = 0; j < cols.length; j++){
                    var td = document.createElement('td');
                    var col = cols[j]//title
                    td.innerText = data[i][col];
                    tr.appendChild(td);
                } 
                tbody.appendChild(tr);             
            }
            table.appendChild(tbody);

            document.body.appendChild(table);
        }

    </script>
</body>
</html>