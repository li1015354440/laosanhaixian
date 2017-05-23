<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<title>老三海鲜</title>
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/myreset.css"/>
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/detail.css"/>
		<script src="/laosan/Public/Home/js/jquery.min.js"></script>
		<script src="/laosan/Public/Home/js/jquery.event.drag.js"></script>
		<script src="/laosan/Public/Home/js/jquery.touchSlider.js"></script>
		<script src="/laosan/Public/Home/js/tools.js"></script>
	</head>
	<body data-goods_id="<?php echo ($goods_info['goods_id']); ?>">
		<!--banner-->
		<div class="detail-img" id="banner-box">
			<div class="main_img">
				<div class="banner-images" id="img-box">
					<?php if(is_array($goods_galleries)): $i = 0; $__LIST__ = $goods_galleries;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gallery): $mod = ($i % 2 );++$i;?><img src="/laosan/Public/Thumb/<?php echo ($gallery['gallery_img']); ?>" alt="baobaowan" /><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<a href="javascript:;" id="btn_prev"></a>
				<a href="javascript:;" id="btn_next"></a>
			</div>
			<div class="pagination-content" id="pagination"></div>
		</div>
		
		<!--title 标题-->
		<div class="detail-title">
			<p><?php echo ($goods_info['name']); ?></p>
			<div class="detail-price">¥ <?php echo ($goods_info['shop_price']); ?></div>
		</div>
		
		<!--cut 分割线-->
		<div class="cut"></div>
		
		<!--introduction 详细介绍-->
		<div class="introduction">
			<!--<img src="../img/xiangqingjieshao.png" alt="" />-->
			<img src="/laosan/Upload/<?php echo ($goods_info['description_img']); ?>" alt="详情图" />
		</div>
		
		<!--placeholder 占位元素-->
		<div class="placeholder"></div>
		
		<!--底部-->
		<ul class="footer">
			<li><a href="<?php echo U('Shop/index');?>"></a></li>
			<li id="cart">
				<a href="<?php echo U('Buy/cart');?>"></a>
				<span class="hint" id="hint"></span>
			</li>
			<li><a href="javascript:;" id="buy-now">立即购买</a></li>
			<li><a href="javascript:;" id="add-car">加入购物车</a></li>
		</ul>
		
		<!--加入购物车弹框-->
		<div class="alert-bg" id="alert-bg">
			<ul class="alert-content" id="animate-bg">
				<li>
					<div>
						<img src="/laosan/Public/Thumb/<?php echo ($goods_info['thumb']); ?>" alt="" />
					</div>
					<div>
						<p><?php echo ($goods_info['series_title']); echo ($goods_info['name']); ?></p>
						<p>
							<span>库存<?php echo ($goods_info['stock']); echo ($goods_info['unit_title']); ?></span>
							<span>¥ <?php echo ($goods_info['shop_price']); ?></span>
						</p>
					</div>
				</li>
				<li>
					<span>购买数量</span>
					<span>
						<a href="javascript:;" id="count-shot">-</a>
						<span id="count">1</span>
						<a href="javascript:;" id="count-more">+</a>
					</span>
				</li>
				<li><a href="javascript:;" id="add-sure">确定</a></li>
			</ul>
		</div>
		
		<script src="/laosan/Public/Home/js/detail.js"></script>
	</body>
</html>