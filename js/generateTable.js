var $ = $ || {};
$.generateTable = function(data){   
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