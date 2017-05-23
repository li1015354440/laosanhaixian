<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<title>老三海鲜</title>
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/myreset.css" />
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/shop-car.css"/>
		<script src="/laosan/Public/Home/js/jquery.min.js"></script>
		<script src="/laosan/Public/Home/js/tools.js"></script>
	</head>

	<body>
		<ul class="shop-calr-list" id="check-list">
			<?php if(is_array($cart_list)): $i = 0; $__LIST__ = $cart_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart): $mod = ($i % 2 );++$i;?><li data-goods_id="<?php echo ($cart['goods_id']); ?>">
						<span class="check" check="true"></span>
						<img src="/laosan/Public/Thumb/<?php echo ($cart['thumb']); ?>" alt="" />
						<div>
							<p><?php echo ($cart['series_title']); echo ($cart['name']); ?></p>
							<div>¥<span class="price"><?php echo ($cart['shop_price']); ?></div>
							<div>
								<a href="#" class="less">-</a>
								<span class="counts"><?php echo ($cart['buy_quantity']); ?></span>
								<a href="#" class="add">+</a>
							</div>
						</div>
						<div class="shop-del">
							删除
						</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		
		<!--placeholder2 占位元素2-->
		<div class="placeholder2"></div>

		<div class="settle-accounts">
			<div id="checks" check="true">
				<span></span>
				<span>全选</span>
			</div>
			<div>
				<span>总计：</span>
				<span>¥<span id="total">0</span></span>
				<a href="javascript:;" id="accounts">结算</a>
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
					<img src="/laosan/Public/Home/img/wode_defauflt@2x.png" alt="" />
					<span>我的</span>
				</a>
			</li>
		</ul>


		<!--js-->
		<script>
			// 判断cookie
			console.log(document.cookie);
			if(document.cookie.indexOf("flag=1")!=-1){
				// 取消cookie
				setCookie('flag',null,-1);
				location.reload();
			}
		</script>
		<script src="/laosan/Public/Home/js/shop-car.js"></script>
	</body>

</html>