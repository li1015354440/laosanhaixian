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
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/index.css" />
		<script src="/laosan/Public/Home/js/jquery.min.js"></script>
		<script src="/laosan/Public/Home/js/jquery.event.drag.js"></script>
		<script src="/laosan/Public/Home/js/jquery.touchSlider.js"></script>
		<script src="/laosan/Public/Home/js/tools.js"></script>
	</head>

	<body>
		<!--触摸滑动-->
		<div class="banner" id="banner-box">
			<div class="main_img">
				<div class="banner-images" id="img-box">
					<?php if(is_array($banner_list)): $i = 0; $__LIST__ = $banner_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$banner): $mod = ($i % 2 );++$i;?><img src="/laosan/Public/Thumb/<?php echo ($banner['banner_thumb']); ?>" alt="Banner图" /><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<a href="javascript:;" id="btn_prev"></a>
				<a href="javascript:;" id="btn_next"></a>
			</div>
			<div class="pagination-content" id="pagination"></div>
		</div>

		<!--nav-->
		<div class="nav">
			<h1 class="nav-h-1">
				<span>
					<span class="line-left"></span>
					CATEGORY
					<span class="line-right"></span>
				</span>
			</h1>
			<h1 class="nav-h-2">产品类目</h1>
			<ul>
				<?php if(is_array($type_list)): $i = 0; $__LIST__ = $type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><li style="background: url('/laosan/Public/Thumb/<?php echo ($type['type_thumb']); ?>') no-repeat top; background-size:65%;"><a href="<?php echo U('list',['type_id'=>$type['type_id']]);?>"><?php echo ($type['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>

		<!--cut-->
		<div class="cut"></div>

		<!--main-->
		<div class="main">
			<h1 class="nav-h-1">
				<span>
					<span class="line-left"></span>
					Hot
					<span class="line-right"></span>
				</span>
			</h1>
			<h1 class="nav-h-2">热销产品</h1>
			<ul class="commodity" id="commodity">
				<?php if(is_array($hot_goods_list)): $i = 0; $__LIST__ = $hot_goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot): $mod = ($i % 2 );++$i;?><li>
						<a href="<?php echo U('detail',['goods_id'=>$hot['goods_id']]);?>">
							<img src="/laosan/Public/Thumb/<?php echo ($hot['thumb']); ?>" alt="<?php echo ($hot['name']); ?>" />
						</a>
						<p><?php echo ($hot['series_title']); ?></p>
						<p><?php echo ($hot['name']); ?></p>
						<p>￥<?php echo ($hot['shop_price']); ?></p>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>

		<!--placeholder 占位元素-->
		<div class="placeholder"></div>

		<ul class="menu" id="menu">
			<li>
				<a href="<?php echo U('Shop/index');?>">
					<img src="/laosan/Public/Home/img/shouye_pressed@2x.png" alt="" />
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
		<script src="/laosan/Public/Home/js/index.js"></script>
	</body>

</html>