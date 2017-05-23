<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>BaoBaoWan</title>
		
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/myreset.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/login.css" />
		<script src="/Public/Home/js/jquery.min.js"></script>
		<script src="/Public/Home/js/tools.js"></script>
	</head>
	<body>
		<ul class="ul_input">
			<li>
				<span>手机号</span>
				<input type="text" data-url="<?php echo U('getCode');?>" name="tel" id="tel" />
				<input type="button" id="getcode" value="获取验证码"/>
			</li>
			<li>
				<span>验证码</span>
				<input type="text" name="code" id="iden_code" data-indexurl="<?php echo U('Shop/index');?>" data-conurl="<?php echo U('checkCode');?>" />
			</li>
		</ul>
		
		<div class="save">
			<button id="login_btn">登录</button>
		</div>
		<script src="/Public/Home/js/login.js"></script>
	</body>
</html>