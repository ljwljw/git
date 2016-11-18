function ajax(url,data=''){
        var ret = '';
    	 //alert(data)
    //	 return false;
        $.ajax({
            type : "get",
            url : 'http://www.wsc.com/shixun/jiekou/laravel/public/'+url,
            dataType : 'jsonp',
            data: data,
            jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
            jsonpCallback:"success_jsonpCallback",//自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名
            async: false,
            success : function(json){
              ret = json;
            },
            error:function(){
              alert('fail');
            }
       });
        return ret;
     };

