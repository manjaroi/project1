function Datagrid(){
	this.url = "";
	this.params = {};
	this.method = "get";
	this.cols = "";

	this.init = function(){};

	this.refresh = function(){
		$.ajax({
			api : this.url,
			params : this.params,
			method : this.method,
			success : function(res){
				let obj = window.eval('(' + res + ')');
				this.generateTable(obj.data);
			}.bind(this)
		})
	}

	this.generateTable = function(data){   
	    var table = document.createElement('table');
	    table.className = 'table';
	    var thead = document.createElement('thead');
	    var tr = document.createElement('tr');
	    if (this.cols) {
	    	this.cols = this.cols.split(',');
	    }else{
	    	this.cols = Object.keys(data[0]);
	    }
	    var cols = ['name', 'gender', 'age', 'phone', 'address'];
	    for(var i = 0; i < this.cols.length; i++){
	        var th = document.createElement('th');
	        th.innerText = this.cols[i];
	        tr.appendChild(th);
	    }
	    thead.appendChild(tr);
	    table.appendChild(thead);


	    var tbody = document.createElement('tbody');
	    for(var i = 0; i < data.length; i++){
	        tr = document.createElement('tr');
	        for(var j = 0; j < this.cols.length; j++){
	            var td = document.createElement('td');
	            var col = this.cols[j]//title
	            td.innerText = data[i][col];
	            tr.appendChild(td);
	        } 
	        tbody.appendChild(tr);             
	    }
	    table.appendChild(tbody);

	    document.body.appendChild(table);
	}
}