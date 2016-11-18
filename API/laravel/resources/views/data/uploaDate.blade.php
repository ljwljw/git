<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="description" content="">
		<link rel="stylesheet" type="text/css" href="css/slick.css" />
		<link rel="stylesheet" type="text/css" href="css/base.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/iconfont/iconfont.css" />
		<title>下载中心</title>
		<body>
			<div class="header">
				<span>下载中心</span>
				<a href="data.html" class="back"><i class="iconfont icon-left"></i></a>
			</div>
			<div class="banner">
				<img src="img/self-report.png">
			</div>
			<div class="noticeDtail">
			</div>
			<div>
			<h6>我要回答:</h6><br>  <textarea name="" id="pinglun" cols="30" rows="10"></textarea>
			<button id="submit">确定</button>
			</div>
			<script src="js/jquery-1.10.2.min.js"></script>
			<script type="text/javascript" src="js/basic.js"></script>
			<script type="text/javascript" src="js/rem.js"></script>
		</body>
		
</html>
<script src="js/ajax.js"></script>
<script>
//详情页
	$(function(){
		//获取参数的id
		var str = location.href;		//获取整个地址栏
		var num = str.indexOf('=');		//从哪里开始
		var id = str.substr(num+1);		//获取参数
		//调用ajax   
		var data = {id:id}
		var json = ajax('uploaDate',data);
		var str = '';
			str += '<p class="detail-tit">'+json['name']+'<span>'+json['time']+'</span></p><p class="detail-txt">'+json['content']+'</p>';
		$('.noticeDtail').html(str);
		//评论
		$("#submit").click(function(){
	  		var pinglun = $("#pinglun").val()
		    var mydate = new Date();
		    var time=mydate.toLocaleString();
		    var data = {pinglun:pinglun,time:time,qid:id}
		    json = ajax('uploaDate',data);
		    if(json){
		    	alert(json)
		    }
	  	})
		//alert(id)
		/*$.ajax({
			    type : "get",
			    url : "http://www.wsc.com/shixun/jiekou/laravel/public/uploaDate",
			    dataType : "jsonp",
			    data:{id:id},
			    jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
			    jsonpCallback:"success_jsonpCallback",//自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名
			    success : function(json){
			    	var str = '';
			    		str += '<p class="detail-tit">'+json['name']+'<span>'+json['time']+'</span></p><p class="detail-txt">'+json['content']+'</p>';
			    	$('.noticeDtail').html(str);
			    },
			    
			  });
		//评论
		$("#submit").click(function(){
		    var pinglun = $("#pinglun").val()
		    var mydate = new Date();
		    var time=mydate.toLocaleString();
			$.ajax({
				type: "GET",
				url : "http://www.wsc.com/shixun/jiekou/laravel/public/pinglun",
				dataType : "jsonp",
				data: {pinglun:pinglun,time:time,qid:id},
				jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
				jsonpCallback:"success_jsonpCallback",//自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名
				success: function(msg){
	       			alert(msg)
				}
			});
	  	})*/

	})
</script>