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
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/list.css" />
		<script src="/laosan/Public/Home/js/jquery.min.js"></script>
		<script src="/laosan/Public/Home/js/tools.js"></script>
	</head>

	<body>
		<div class="main">
			<ul class="commodity" id="commodity">
				<?php if(is_array($goods_list)): $i = 0; $__LIST__ = $goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo U('detail',['goods_id'=>$goods['goods_id']]);?>">
						<img src="/laosan/Public/Thumb/<?php echo ($goods['thumb']); ?>" alt="<?php echo ($goods['name']); ?>" />
					</a>
					<p><?php echo ($goods['series_title']); ?></p>
					<p><?php echo ($goods['name']); ?></p>
					<p>¥<?php echo ($goods['shop_price']); ?></p>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>

		<!--js-->
		<script src="/laosan/Public/Home/js/list.js"></script>
	</body>

</html>