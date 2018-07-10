$.fn.datagrid = function(options){
    var _opts = {
        url : '',
        method : 'get',
        cols : '',
        data : {},
    };

    var opts = $.extend(_opts,options);

    var refresh = function(){
        var table = $('<table class="table"></table>');
        var thead = $('<thead></thead>');
        var tbody = $('<tbody></tbody>');
        http[_opts.method](opts.url,opts.data,function(res){
            var columns = opts.cols ? opts.cols.split(',') : Object.keys(res.data.data[0]);
            console.log(columns);
            var tr = $('<tr></tr>');
            for(let col of columns){
                console.log(col);
                $('<th></th>').text(col).appendTo(tr);
            }
            tr.appendTo(thead); 
            for(let item of res.data.data){
                console.log(item);
                var tr = $('<tr></tr>');
                for(let col of columns){
                    console.log(item[col]);
                    $('<td></td>').text(item[col]).appendTo(tr);
                }
                tr.appendTo(tbody);
                thead.appendTo(table);
                tbody.appendTo(table);
                table.appendTo(this);
            }
        }.bind(this))
    }.bind(this)

    refresh();
}