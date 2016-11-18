<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <link rel="stylesheet" type="text/css" href="css/slick.css"/>
  <link rel="stylesheet" type="text/css" href="css/base.css"/>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <link rel="stylesheet" type="text/css" href="css/iconfont/iconfont.css"/>
  <title>宿舍预定</title>
	<body>
		<div class="header">
			<span>宿舍预定</span>
			<a href="{{url('/')}}" class="back"><i class="iconfont icon-left"></i></a>
		</div>
		<div class="banner">
			<img src="img/self-report.png">
		</div>
		<div class="step"> 
			<ul class="fs0">
				<li>
    			<span class="step-icon passbg">1</span>
    			<p class="step-txt">个人信息</p>
    		</li>
    		<li>
    		<span class="step-icon passbg">2</span>
    			<p class="step-txt">宿舍预定</p>
    		</li>
    		<li>
    			<span class="step-icon">3</span>
    			<p>抵校登记</p>
    		</li>
    		<li>
    			<span class="step-icon">4</span>
    			<p>报到单</p>
    		</li>
    	</ul>
    	<span class="pro-line"><img src="img/pro-line.png"></span>
		</div>
		<ul class="dorm-book">
			<li>
		    <span class="book-tit">校区</span>
		    <input type="text" name="name" id="campus" placeholder="请选择你所在的校区" /> 
		    <span class="goin"><i class="iconfont icon-right"></i></span>
			</li>
			<li>
				<span class="book-tit">楼栋号</span>
		        <input type="text" name="name" id="building" placeholder="请填写您宿舍的楼栋号" />  
		        <span class="goin"><i class="iconfont icon-right"></i></span>
			</li>
			<li>
				<span class="book-tit">宿舍类型</span>
		        <input type="text" name="name" id="sushetype" placeholder="请填写您的宿舍类型" />  
		        <span class="goin"><i class="iconfont icon-right"></i></span>
			</li>
			<li>
				<span class="book-tit">房间号</span>
		        <input type="text" name="name" id="roomnumber" placeholder="请选择您的房间号" />  
		        <span class="goin"><i class="iconfont icon-right"></i></span>
			</li>
			<li>
				<span class="book-tit">铺位</span>
		        <input type="text" name="name" id="puwei" placeholder="请选择您的床铺位置" />  
		        <span class="goin"><i class="iconfont icon-right"></i></span>
			</li>
			
		</ul>
		<div class="step-btn">
				<a href="{{url('/userinfo')}}">上一步</a>
				<a href="javascript:void(0)" id="tijiao">下一步</a>
		</div>
	  <script src="js/jquery-1.10.2.min.js"></script>
      <script type="text/javascript" src="js/rem.js"></script>	
	</body>
</html>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript">
				//宿舍预定
		$(function(){
			$("#tijiao").click(function(){//{{url('/arrive')}}
					var campus=$('#campus').val();
					var building=$('#building').val();
					var sushetype=$('#sushetype').val();
					var roomnumber=$('#roomnumber').val();
					var puwei=$('#puwei').val();
					if(campus==''||building==''||sushetype==''||roomnumber==''||puwei==''){
						alert("选项不能为空");
						return false;
					}else{
						var data = {campus:campus,building:building,sushetype:sushetype,roomnumber:roomnumber,puwei:puwei}
                    	//调用ajax
                    	var json = ajax('dormbook',data);
                    	if (json) {
                    		location.href="{{url('/arrive')}}";
                    	}
						/*$.ajax({
							type : "get",
							url : "http://www.wsc.com/shixun/jiekou/laravel/public/dormbook",
							data:{campus:campus,building:building,sushetype:sushetype,roomnumber:roomnumber,puwei:puwei},
							dataType : "jsonp",
							jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
							jsonpCallback:"success_jsonpCallback",//自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名
							success : function(json){
								//$("#span").html(json);
								//alert(json);
								location.href="{{url('/arrive')}}";
							},
							error:function(){
								alert('fail');
							}
						});*/
					}
			})
		})
</script>
