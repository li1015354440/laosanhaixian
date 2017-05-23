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
		<?php if(is_array($orders)): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><div order_sn="<?php echo ($order['order_sn']); ?>" class="order-container">
				<!--order-num 订单号-->
				<div class="order-num">
					订单号: <span class="order_num"><?php echo ($order['order_sn']); ?></span>
					<span><?php echo ($order['title']); ?></span>
				</div>
	
				<!--商品列表-->
				<div class="all-orders">
					<ul class="orders-list">
						<?php if(is_array($order['goods_info'])): $i = 0; $__LIST__ = $order['goods_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?><li>
								<img src="/laosan/Public/Thumb/<?php echo ($goods['thumb']); ?>" alt="" />
								<div>
									<p><?php echo ($goods['name']); ?></p>
									<p>¥<?php echo ($goods['shop_price']); ?></p>
									<p>x<?php echo ($goods['buy_quantity']); echo ($goods['unit_title']); ?></p>
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
						<li>
							<p>
								<span>共<?php echo ($order['totalNum']); ?>件</span>
								<span>邮递费：¥ 30</span>
								<span>总金额：</span>
								<span>¥ <?php echo ($order['totalPrice']); ?></span>
							</p>
							<?php switch($order['order_statu_id']): case "1": ?><div class="color-yellow"><a href="<?php echo U('Pay/index',['order_sn'=>$order['order_sn']]);?>" class="pay-order">立即支付</a></div>
									<div><a href="javascript:;" class="cancer-order">取消订单</a></div><?php break;?>
								<?php case "2": ?><div><a href="<?php echo U('orderDetail',[order_sn=>$order['order_sn']]);?>" class="look-order">查看订单</a></div><?php break;?>
								<?php case "3": ?><div class="color-yellow"><a href="javascript:;" class="affirm-order">确认收货</a></div>
									<div><a href="<?php echo U('orderDetail',[order_sn=>$order['order_sn']]);?>" class="look-order">查看订单</a></div><?php break;?>
								<?php case "4": ?><div><a href="javascript:;" class="back-order">退货/换货</a></div><?php break; endswitch;?>
	
						</li>
					</ul>
					<!--cut-->
					<div class="cut"></div>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>

		<!--弹框-->
		<div class="alert-bg" id="alert-bg4">
			<div class="alert-content">
				<p>温馨提示</p>
				<p>是否取消订单</p>
				<div><a href="javascript:;" class="cancel">取消</a></div>
				<div><a href="javascript:;" class="affirm">确认</a></div>
			</div>
		</div>

		<!--js-->
		<script src="/laosan/Public/Home/js/orders.js"></script>
	</body>

</html>