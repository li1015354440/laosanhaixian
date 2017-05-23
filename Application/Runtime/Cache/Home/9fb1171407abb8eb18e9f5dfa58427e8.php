<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
			<title>BaoBaoWan</title>
			<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/myreset.css" />
			<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/series.css"/>
	</head>

	<body>
		<!--系列列表-->
		<ul class="series-content">
			<?php if(is_array($series_list)): $i = 0; $__LIST__ = $series_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$series): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Shop/list',['series_id'=>$series['series_id']]);?>"><img src="/laosan/Public/Thumb/<?php echo ($series['series_thumb']); ?>"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>


		</ul>

		<!--placeholder 占位元素-->
		<div class="placeholder"></div>

		<ul class="menu" id="menu">
			<li>
				<a href="<?php echo U('Shop/index');?>">
					<img src="/laosan/Public/Home/img/shouye_defauflt@2x.png" alt="" />
					<span>首页</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Shop/series');?>">
					<img src="/laosan/Public/Home/img/xilie_pressed@2x.png" alt="" />
					<span>系列</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Buy/cart');?>">
					<img src="/laosan/Public/Home/img/gouwuche_defauflt@2x.png" alt="" />
					<span>购物车</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('User/my');?>">
					<img src="/laosan/Public/Home/img/wode_defauflt@2x.png" alt="" />
					<span>我的</span>
				</a>
			</li>
		</ul>

		<!--js-->
		<script src="/laosan/Public/Home/js/jquery.min.js"></script>
		<script src="/laosan/Public/Home/js/tools.js"></script>
	</body>

</html>