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
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/wait.css">
		<script src="/laosan/Public/Home/js/jquery.min.js"></script>
		<script src="/laosan/Public/Home/js/tools.js"></script>
	</head>

	<body>
		<div class="wait-content">
			<ul class="header">
				<li><a class="active" href="javascript:;">待付款</a></li>
				<li><a class="" href="javascript:;">待发货</a></li>
				<li><a class="" href="javascript:;">待收货</a></li>
				<li><a class="" href="javascript:;">已完成</a></li>
			</ul>
			<div class="wait wait-pay">
				<!--cut-->
				<div class="cut"></div>
				<?php if(is_array($unpays)): $i = 0; $__LIST__ = $unpays;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$unpay): $mod = ($i % 2 );++$i;?><div class="list-box">
						<!--order-num 订单号-->
						<div class="order-num">
							订单号: <span class="order_num"><?php echo ($unpay['order_sn']); ?></span>
							<span><?php echo ($unpay['title']); ?></span>
						</div>

						<!--商品列表-->
						<div class="all-orders">
							<ul class="orders-list">
								<?php if(is_array($unpay['goods_info'])): $i = 0; $__LIST__ = $unpay['goods_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><li>
										<img src="/laosan/Public/Thumb/<?php echo ($good['thumb']); ?>" alt="" />
										<div>
											<p><?php echo ($good['name']); ?></p>
											<p>¥<?php echo ($good['shop_price']); ?></p>
											<p>x<?php echo ($good['buy_quantity']); echo ($good['unit_title']); ?></p>
										</div>
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
								<li>
									<p>
										<span>共<?php echo ($unpay['totalNum']); ?>件</span>
										<span>邮递费：¥ 30</span>
										<span>总金额：</span>
										<span>¥ <?php echo ($unpay['totalPrice']); ?></span>
									</p>
									<!--<div class="color-yellow"><a href="javascript:;" class="pay-order">立即支付</a></div>-->
									<div class="color-yellow"><a class="pay-order" href="<?php echo U('Pay/index',['order_sn'=>$unpay['order_sn']]);?>" >立即支付</a></div>
									<div><a href="javascript:;" class="cancel-order">取消订单</a></div>
								</li>
							</ul>
							<!--cut-->
							<div class="cut"></div>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			
			<div class="wait wait-send" style="display: none;">
				<!--cut-->
				<div class="cut"></div>
				<?php if(is_array($unsends)): $i = 0; $__LIST__ = $unsends;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$unsend): $mod = ($i % 2 );++$i;?><div class="list-box">
						<!--order-num 订单号-->
						<div class="order-num">
							订单号: <span class="order_num"><?php echo ($unsend['order_sn']); ?></span>
							<span><?php echo ($unsend['title']); ?></span>
						</div>

						<!--商品列表-->
						<div class="all-orders">
							<ul class="orders-list">
								<?php if(is_array($unsend['goods_info'] )): $i = 0; $__LIST__ = $unsend['goods_info'] ;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><li>
										<img src="/laosan/Public/Thumb/<?php echo ($good['thumb']); ?>" alt="" />
										<div>
											<p><?php echo ($good['name']); ?></p>
											<p>¥<?php echo ($good['shop_price']); ?></p>
											<p>x<?php echo ($good['buy_quantity']); echo ($good['unit_title']); ?></p>
										</div>
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
								<li>
									<p>
										<span>共<?php echo ($unsend['totalNum']); ?>件</span>
										<span>邮递费：¥ 30</span>
										<span>总金额：</span>
										<span>¥ <?php echo ($unsend['totalPrice']); ?></span>
									</p>
									<div><a href="<?php echo U('orderDetail',[order_sn=>$unsend['order_sn']]);?>" class="look-order">查看详情</a></div>
								</li>
							</ul>
							<!--cut-->
							<div class="cut"></div>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			
			<div class="wait wait-delivery" style="display: none;">
				<!--cut-->
				<div class="cut"></div>
				<?php if(is_array($undeliverys)): $i = 0; $__LIST__ = $undeliverys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$undelivery): $mod = ($i % 2 );++$i;?><div class="list-box">
						<!--order-num 订单号-->
						<div class="order-num">
							订单号: <span class="order_num"><?php echo ($undelivery['order_sn']); ?></span>
							<span><?php echo ($undelivery['title']); ?></span>
						</div>

						<!--商品列表-->
						<div class="all-orders">
							<ul class="orders-list">
								<?php if(is_array($undelivery['goods_info'])): $i = 0; $__LIST__ = $undelivery['goods_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><li>
										<img src="/laosan/Public/Thumb/<?php echo ($good['thumb']); ?>" alt="" />
										<div>
											<p><?php echo ($good['name']); ?></p>
											<p>¥<?php echo ($good['shop_price']); ?></p>
											<p>x<?php echo ($good['buy_quantity']); echo ($good['unit_title']); ?></p>
										</div>
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
								<li>
									<p>
										<span>共<?php echo ($undelivery['totalNum']); ?>件</span>
										<span>邮递费：¥ 30</span>
										<span>总金额：</span>
										<span>¥ <?php echo ($undelivery['totalPrice']); ?></span>
									</p>
									<div class="color-yellow"><a href="javascript:;" class="affirm-order">确认收货</a></div>
									<div><a href="<?php echo U('orderDetail',[order_sn=>$undelivery['order_sn']]);?>" class="look-order">查看订单</a></div>
								</li>
							</ul>
							<!--cut-->
							<div class="cut"></div>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			
			<div class="wait orders-finish" style="display: none;">
				<!--cut-->
				<div class="cut"></div>
				<?php if(is_array($finshorders)): $i = 0; $__LIST__ = $finshorders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$finishorder): $mod = ($i % 2 );++$i;?><div class="list-box">
						<!--order-num 订单号-->
						<div class="order-num">
							订单号: <span class="order_num"><?php echo ($finishorder['order_sn']); ?></span>
							<span><?php echo ($finishorder['title']); ?></span>
						</div>

						<!--商品列表-->
						<div class="all-orders">
							<ul class="orders-list">
								<?php if(is_array($finishorder['goods_info'])): $i = 0; $__LIST__ = $finishorder['goods_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><li>
										<img src="/laosan/Public/Thumb/<?php echo ($good['thumb']); ?>" alt="" />
										<div>
											<p><?php echo ($good['name']); ?></p>
											<p>¥<?php echo ($good['shop_price']); ?></p>
											<p>x<?php echo ($good['buy_quantity']); echo ($good['unit_title']); ?></p>
										</div>
									</li><?php endforeach; endif; else: echo "" ;endif; ?>


								<li>
									<p>
										<span>共<?php echo ($finishorder['totalNum']); ?>件</span>
										<span>邮递费：¥ 30</span>
										<span>总金额：</span>
										<span>¥ <?php echo ($finishorder['totalPrice']); ?></span>
									</p>
									<div><a href="javascript:;" class="back-order">退货/换货</a></div>
								</li>
							</ul>
							<!--cut-->
							<div class="cut"></div>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>

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
		<div class="alert-bg" id="alert-bg3">
			<div class="alert-content">
				<p>温馨提示</p>
				<p>是否取消订单</p>
				<div><a href="javascript:;" class="cancel">取消</a></div>
				<div><a href="javascript:;" class="affirm">确认</a></div>
			</div>
		</div>
		
		<!--js-->
		
		<script src="/laosan/Public/Home/js/wait.js"></script>
	</body>

</html>