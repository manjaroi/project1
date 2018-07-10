var Cookie = {
	get:function(name){
		// 获取所有
		var cookies = document.cookie;

		// 转成数组
		cookies = cookies.split('; ');//['goodslist=[]','your=lemon']

		var res = '';
		for(var i=0;i<cookies.length;i++){
			// 拆分cookieName和cookieValue
			var arr = cookies[i].split('=');
			if(arr[0] === name){
				res = arr[1];
				break;
			}
		}

		return res;

	},
	/**
	 * [设置cookie]
	 * @param {String} name  [cookie名]
	 * @param {String} value [cookie值]
	 * @param {[Object]} param [cookie参数]
	 	* {expires,path,secure,domain}
	 */
	set:function(name,value,param){
		//param = {expires,path,secure,domain}
		var cookie = name + '=' + value;

		if(param){
			// 有效期
			if(param.expires){
				cookie += ';expires='+param.expires.toUTCString();
			}

			// 保存路径
			if(param.path){
				cookie += ';path=' + param.path;
			}

			// 域名
			if(param.domain){
				cookie += ';domain=' + param.domain;
			}

			// 安全性
			if(param.secure){
				cookie += ';secure'
			}

		}
		
		document.cookie = cookie;

	},
	remove:function(name,path){
		// 原理：设置过期时间达到删除效果
		var now = new Date();
		now.setDate(now.getDate()-1);

		this.set(name,null,{expires:now,path:path});
	},

}