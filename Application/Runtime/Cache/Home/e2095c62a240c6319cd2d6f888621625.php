<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>baobaowan</title>
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/myreset.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/complete.css"/>
		<script src="/Public/Home/js/jquery.min.js"></script>
		<script src="/Public/Home/js/tools.js"></script>
	</head>

	<body>
		<div class="header"></div>
		
		<div class="pay-finish-content">
			<div></div>
			<p>订单交易完成</p>
			<p>
				<span>总价：</span>
				<span>¥<?php echo ($total_price); ?></span>
			</p>
			<a href="<?php echo U('User/orderDetail',['order_sn'=>$order_sn]);?>">查看订单</a>
			<a href="<?php echo U('Shop/index');?>">返回首页</a>
			<p>
				<span>交易方式：</span>
				<span>支付宝支付</span>
			</p>
			<p>
				<span>订单完成时间：</span>
				<span><?php echo ($time); ?></span>
			</p>
		</div>
	</body>

</html>