var http = {
    baseUrl : 'http://admin-lybz.jcebing.com:8089/api/',
    filterUrl : function(_url){
        if (_url.startsWith('http')) {
            return _url;
        }
        return _url + this.baseUrl;
    },

    get : function(_url,_params,_callback){
        _url = this.filterUrl(_url);
        $.ajax({
            url : _url,
            data : _params || {},
            headers: {
                Authorization: "Bearer " + window.localStorage.getItem('access_token')
            },

            beforeSend : function(){
                if ($('.mask')[0]) {
                    $('.mask').show();
                }else{
                    var _mask = `<div class="mask" style="position: fixed; top: 0; right: 0; bottom: 0; left: 0; background-color: #ccc; opacity: .3;">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>`;
                    $(_mask).appendTo('body').show();
                }
            },

            success : function(res){
                _callback(res);
            },

            error : function(){
                if (error.responseJSON.code == 40001) {
                    window.location.href = 'login2.html';
                }
            },

            complete : function(){
                $('.mask').hide();
                $('.mask').remove();
            },
        })
    },

    post : function(_url,_params,_callback){
        _url = this.filterUrl(_url);
        console.log(window.localStorage.getItem('access_token'));
        $.ajax({
            url : _url,
            data : _params || {},
            type : 'post',
            headers: {
                Authorization: "Bearer " + window.localStorage.getItem('access_token')
            },
            beforeSend : function(){
                if ($('.mask')[0]) {
                    $('.mask').show();
                }else{
                    var _mask = `<div class="mask" style="position: fixed; top: 0; right: 0; bottom: 0; left: 0; background-color: #ccc; opacity: .3;">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>`;
                    $(_mask).appendTo('body').show();
                }
            },

            success : function(res){
                _callback(res);
            },

            error : function(){
                if (error.responseJSON.code == 40001) {
                    window.location.href = 'login2.html';
                }
            },

            complete : function(){
                $('.mask').hide();
                $('.mask').remove();
            },
        })
    }



    // post : function(_url,_params,_callback){
        
    //     return new Promise(function(resolve,reject){
            
    //         $.ajax({
    //             url : this.filterUrl(_url),

    //             data : _params || {},

    //             beforeSend : function(){
    //                 if ($('.mask')[0]) {
    //                     $('.mask').show();
    //                 }else{
    //                     var _mask = `<div class="mask" style="position: fixed; top: 0; right: 0; bottom: 0; left: 0; background-color: #ccc; opacity: .3;">
    //                                  <i class="fa fa-refresh fa-spin"></i>
    //                                  </div>`;
    //                     $(_mask).appendTo('body').show(); 
    //                 }
    //             },

    //             success : function(res){
    //                 resolve(_callback(res));
    //             },

    //             error : function(err){
    //                 reject(err);
    //                 if (error.responseJSON.code == 40001) {
    //                     window.localtion.href = 'login2.html';
    //                 }
    //             },

    //             complete : function(){
    //                 $('.mask').hide();
    //                 $('.mask').remove();
    //             },
    //         })
    //     })

    // }
}