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
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/pay-finish.css"/>
		<script src="/Public/Home/js/jquery.min.js"></script>
		<script src="/Public/Home/js/tools.js"></script>
	</head>

	<body>
		<div class="header"></div>
		<div class="pay-finish-content">
			<div>
				<img src="/Public/Home/img/duigou.png" alt="" />
			</div>
			<p>订单交易完成</p>
			<p>总交易额：¥<span><?php echo ($total_price); ?></span></p>
			<h1>请进入微信查看订单详情</h1>
		</div>
	</body>

</html>