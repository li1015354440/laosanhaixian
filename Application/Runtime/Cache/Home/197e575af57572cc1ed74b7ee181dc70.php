<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>老三海鲜</title>
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/myreset.css" />
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/my.css"/>
		<script src="/laosan/Public/Home/js/jquery.min.js"></script>
		<script src="/laosan/Public/Home/js/tools.js"></script>
	</head>

	<body>
		<div class="header">
			<div class="head-portrait login"></div>
			<p class="login" id="login">请点击登录</p>
		</div>
		
		<!--cut-->
		<div class="cut"></div>
		
		<div class="all-orders">
			<span>全部订单</span>
			<span><a href="<?php echo U('User/orders');?>">查看全部订单</a></span>
		</div>
		
		<!--nav-->
		<ul class="nav">
			<li><a href="<?php echo U('wait',['id'=>1]);?>" >待付款</a></li>
			<li><a href="<?php echo U('wait',['id'=>2]);?>">待发货</a></li>
			<li><a href="<?php echo U('wait',['id'=>3]);?>">待收货</a></li>
			<li><a href="<?php echo U('wait',['id'=>4]);?>">已完成</a></li>
		</ul>

		<!--cut-->
		<div class="cut"></div>
		
		<!--列表-->
		<ul class="sets">
			<li><a href="<?php echo U('User/addressList');?>">地址管理</a></li>
			<li><a href="javascript:;" id="contact-service">联系客服<span>010-85850907</span></a></li>
			<li id="iflogin"><a href="javascript:;">退出登录</a></li>
		</ul>

		<!--placeholder 占位元素-->
		<div class="placeholder"></div>

		<!--menu-->
		<ul class="menu" id="menu">
			<li>
				<a href="<?php echo U('Shop/index');?>">
					<img src="/laosan/Public/Home/img/shouye_defauflt@2x.png" alt="" />
					<span>首页</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Buy/cart');?>">
					<img src="/laosan/Public/Home/img/gouwuche.png" alt="" />
					<span>购物车</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('User/my');?>">
					<img src="/laosan/Public/Home/img/wode_pressed@2x.png" alt="" />
					<span>我的</span>
				</a>
			</li>
		</ul>


		<!--弹框-->
		<div class="alert-bg" id="alert-bg">
			<div class="alert-content">
				<p>温馨提示</p>
				<p>010-85850907</p>
				<div><a href="#" id="cancel">取消</a></div>
				<div><a href="tel:010-85850907" id="affirm">拨号</a></div>
			</div>
		</div>

		<!--弹框-->
		<div class="alert-bg" id="alert-bg2">
			<div class="alert-content">
				<p>温馨提示</p>
				<p>是否退出登录</p>
				<div><a href="javascript:;" class="cancel">取消</a></div>
				<div><a href="javascript:;" class="affirm">确认</a></div>
			</div>
		</div>
		
		<!--js-->
		
		<script src="/laosan/Public/Home/js/my.js"></script>
	</body>

</html>