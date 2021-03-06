// var $ = $ || {};

// var baseUrl = 'http://localhost:82/day04/';
// function filterUrl(_url){
//     if(_url.startsWith('http')){
//         return _url;
//     }
//     return baseUrl + _url;
// }

// $.ajax = function(opts){
//     let {api, params, method = 'post', success} = opts;

//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function(){
//         if(xhr.readyState == 4 && xhr.status == 200){
//             success(xhr.responseText);
//         }
//     };



//     xhr.open(method, filterUrl(api));
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhr.send(`username=${document.getElementById('username').value}&pwd=${document.getElementById('pwd').value}`);
// }

/***
 * ajax 封装解决以下总是
 * 统一处理错误信息
 * 统一处理 Loading
 * 统一处理 baseUrl
***/

var $ = {};

$.baseUrl = 'http://192.168.111.1:666/src/jquery/';

$.filterUrl = function(url){
    if(url.startsWith('192.168.111.1')){
        return url;
    }
    return $.baseUrl + url;
}

$.ajax = function(options){
    let {api, method = 'get', params = {}, success} = options;

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            success(xhr.responseText);
        }
    }
    api = $.filterUrl(api);
    let _params = [];
    for(key in params){
        _params.push(`${key}=${params[key]}`);
    }

    if(method.toLowerCase() == 'get'){
        api += '?' + _params.join('&');
        xhr.open(method, api);
        xhr.send(null);
    } else if(method.toLowerCase() == 'post'){
        xhr.open(method, api);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(_params.join('&'));
    }
}