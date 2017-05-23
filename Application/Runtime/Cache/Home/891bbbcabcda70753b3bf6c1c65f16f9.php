<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>BaoBaoWan</title>
		<link rel="stylesheet" href="/Public/Home/css/myreset.css" />
		<link rel="stylesheet" href="/Public/Home/css/orders-detail.css" />
		<script type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
		<script type="text/javascript" src="/Public/Home/js/tools.js"></script>
	</head>
	<body>
		<div class="content">
			<div class="banner">
				<img src="/Public/Home/img/case.png">
				<span>订单正在处理</span>
			</div>
			<div class="personal-information">
				<img src="/Public/Home/img/dizhi.png" />
				<div>
					<p><span><?php echo ($detail['recept_name']); ?></span><span><?php echo ($detail['tel']); ?></span></p>
					<p><?php echo ($detail['province']); echo ($detail['city']); echo ($detail['detail']); ?></p>
				</div>
			</div>
			<div class="all-orders">
				<ul class="orders-list">
					<?php if(is_array($detail['goods_info'])): $i = 0; $__LIST__ = $detail['goods_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><li>
							<img src="/Public/Thumb/<?php echo ($good['thumb']); ?>" alt="" />
							<div>
								<p><?php echo ($good['series_title']); echo ($good['name']); ?></p>
								<p>￥<?php echo ($good['shop_price']); ?></p>
								<p>x<?php echo ($good['buy_quantity']); ?></p>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>

					<li>
						<p class="li-p1"><span>配送信息</span><span>包邮</span></p>
						<p class="li-p2"><span>备注</span>
							<span>
							<?php if(($detail['comment'] == '') ): ?>无<?php else: echo ($detail['comment']); endif; ?>
							</span>
						</p>
					</li>
				</ul>
			</div>
			
			<div class="actual-payment">
				<p>
					<sapn class="actual-payment-s1">实付款:</sapn>
					<span class="actual-payment-s2">¥<?php echo ($detail['totalPrice']); ?></span>
				</p>
			</div>
			
			<div class="message-list">
				<ul>
					<li><span>信息列表</span></li>
					<li><span>订单号:</span><span><?php echo ($detail['order_sn']); ?></span></li>
					<li><span>支付方式:</span><span>支付宝</span></li>
					<li><span>下单时间:</span><span><?php echo date('Y-m-d H:i:s',$detail['create_at']);?></span></li>
				</ul>
			</div>
		</div>
		<!--menu-->
		<ul class="menu" id="menu">
			<li>
				<a href="<?php echo U('Shop/index');?>">
					<img src="/Public/Home/img/shouye_defauflt@2x.png" alt="" />
					<span>首页</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Shop/series');?>">
					<img src="/Public/Home/img/xilie_defauflt@2x.png" alt="" />
					<span>系列</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Buy/cart');?>">
					<img src="/Public/Home/img/gouwuche_defauflt@2x.png" alt="" />
					<span>购物车</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('User/my');?>">
					<img src="/Public/Home/img/wode_pressed@2x.png" alt="" />
					<span>我的</span>
				</a>
			</li>
		</ul>
	</body>
</html>