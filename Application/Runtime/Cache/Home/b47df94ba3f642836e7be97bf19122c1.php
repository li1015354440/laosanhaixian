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
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/pay.css" />
		<script src="/laosan/Public/Home/js/jquery.min.js"></script>
		<script src="/laosan/Public/Home/js/tools.js"></script>
	</head>

	<body data-from="<?php echo ($from); ?>">
		<div class="pay-header">
			<?php if(isset($recept_default)): ?><!--有地址显示-->
				<a href="javascript:;" class="address-msg yesbody" id="yesbody" data-recept_id="<?php echo ($recept_default['recept_id']); ?>">
					<p>
						<span id="old_name"><?php echo ($recept_default['recept_name']); ?></span>
						<span id="old_tel"><?php echo ($recept_default['tel']); ?></span>
					</p>
					<p id="old_address"><?php echo ($recept_default['province']); echo ($recept_default['city']); echo ($recept_default['country']); echo ($recept_default['detail']); ?></p>
				</a>
				<!--没有地址显示-->
				<a href="javascript:;" class="address-msg nobody">
					<span></span>
					<span>添加收货人信息</span>
				</a>
				<?php else: ?>
				<!--没有地址显示-->
				<a href="<?php echo ($addAddress_url); ?>" class="address-msg nobody">
					<span></span>
					<span>添加收货人信息</span>
				</a>
				<!--有默认地址-->
				<a href="javascript:;" class="address-msg yesbody" data-recept_id="<?php echo ($recept['recept_id']); ?>">
					<p>
						<span>name</span>
						<span>tel</span>
					</p>
					<p>address</p>
				</a><?php endif; ?>
		</div>

		<!--cut-->
		<div class="cut"></div>

		<!--商品列表-->
		<ul class="orders-list" id="orders-list">
			<?php if(is_array($order_list)): $i = 0; $__LIST__ = $order_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><li data-goods_id="<?php echo ($order['goods_id']); ?>">
					<img src="/laosan/Public/Thumb/<?php echo ($order['thumb']); ?>" alt="" />
					<div>
						<p><?php echo ($order['name']); ?></p>
						<p>¥<?php echo ($order['shop_price']); ?></p>
						<p>x<span id="quantity"><?php echo ($order['buy_quantity']); echo ($order['unit_title']); ?></span></p>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			<li></li>
		</ul>

		<!--cut-->
		<div class="cut"></div>

		<ul class="commodity-msg">
			<li>
				<span>商品总价</span>
				<span>¥<?php echo ($total_price); ?></span>
			</li>
			<li>
				<span>邮递费</span>
				<span>30</span>
			</li>
			<li>
				<span>备注</span>
				<textarea id="commodity-remark">若有尺寸等问题请备注留言，客服会尽快与您联系</textarea>
			</li>
		</ul>

		<!--placeholder 占位元素-->
		<div class="placeholder"></div>

		<div class="footer">
			<span>实际支付：</span>
			<span>¥<?php echo ($total_price); ?></span>
			<a href="javascript:;" id="buy_now">立即付款</a>
		</div>

		<!--地址列表弹框-->
		<div class="pay_alert" id="pay_alert">
			<ul class="address-list" id="payer_list">
				<?php if(is_array($recept_list)): $i = 0; $__LIST__ = $recept_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$recept): $mod = ($i % 2 );++$i;?><li data-recept_sn="<?php echo ($recept['recept_id']); ?>">
						<span class="check"></span>
						<div>
							<p><span id="address_name"><?php echo ($recept['recept_name']); ?></span><span id="address_tel"><?php echo ($recept['tel']); ?></span></p>
							<p id="address_detail"><?php echo ($recept['province']); echo ($recept['city']); echo ($recept['country']); echo ($recept['detail']); ?></p>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>

		<!--弹框-->
		<div class="alert-bg" id="alert-bg5">
			<div class="alert-content">
				<p>温馨提示</p>
				<p>请选择地址</p>
				<div><a href="javascript:;" class="cancel">取消</a></div>
				<div><a href="javascript:;" class="affirm">确认</a></div>
			</div>
		</div>

		<!--弹框-->
		<div class="alert-bg" id="alert-bg6">
			<div class="alert-content">
				<p>温馨提示</p>
				<p>库存不足</p>
				<div><a href="javascript:;" class="cancel">取消</a></div>
				<div><a href="javascript:;" class="affirm">确认</a></div>
			</div>
		</div>

		<!--js-->

		<script src="/laosan/Public/Home/js/pay.js"></script>
	</body>

</html>