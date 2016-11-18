<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <link rel="stylesheet" type="text/css" href="css/iconfont/iconfont.css"/>
  <link rel="stylesheet" type="text/css" href="css/slick.css"/>
  <link rel="stylesheet" type="text/css" href="css/base.css"/>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <title>个人中心</title>
	<body class="bge">
		<div class="write-info">
			<span>
				<img src="img/no-person.png">
			</span>
			<p>您还没有填写信息哦</p>
			<span class="goin"><i class="iconfont icon-right"></i></span>
		</div>
		<ul class="ask-box">
			<li class="ask-item">
				<a href="{{ url('/userinfo')}}">
				    <i class="iconfont icon-data"></i>
				    <span class="ask-word">个人信息</span>
				    <span class="goin"><i class="iconfont icon-right"></i></span>
				</a>
			</li>
			<li class="ask-item nobor">
				<a href="{{ url('/changepsw') }}">
				    <i class="iconfont icon-changpsw"></i>
				    <span class="ask-word">修改密码</span>
				    <span class="goin"><i class="iconfont icon-right"></i></span>
				</a>
			</li>
			
		</ul>
		<div class="sign-out">
				<a href="#">
					<i class="iconfont icon-logout"></i>
				   <span>退出</span>
				</a>
		</div>
		<div class="footer">
    	@extends('footer')
    </div>
    <div class="outlayer">
    	<div class="tip-box">
    		<h3>退出</h3>
    		<p class="ta-right">
    			  <a href="#" class="ok">确认</a>
    				<a href="#" class="cancel">取消</a>
    		</p>
    	</div>
    	<div class="cover"></div>
    </div>
	 <script src="js/jquery.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/basic.js"></script>
		<script src="js/rem.js"></script>
	</body>
</html>
