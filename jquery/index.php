<?php

	session_start();

	if (!isset($_SESSION['user'])) {
		header('Location:login.html');
		exit;
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="../assets/jquery-3.2.1.js"></script>
</head>
<body>
	<script>
		$.ajax({
			url : 'http://192.168.111.1:666/src/jquery/students.php',
			success : function(res){
				console.log(res);
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