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
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/administered-address.css"/>
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/wait.css">
		<script src="/laosan/Public/Home/js/jquery.min.js"></script>
		<script src="/laosan/Public/Home/js/tools.js"></script>
	</head>

	<body>
		<ul class="address-list">
			<?php if(is_array($adds)): $i = 0; $__LIST__ = $adds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$add): $mod = ($i % 2 );++$i;?><li>
					<p><span><?php echo ($add['recept_name']); ?></span><span><?php echo ($add['tel']); ?></span></p>
					<p><?php echo ($add['province']); echo ($add['city']); echo ($add['country']); echo ($add['detail']); ?></p>
					<div>
						<a href="<?php echo U('addAddress',['recept_id'=>$add['recept_id'] ,'from'=>'my'] );?>">编辑</a>
						<a href="<?php echo U('deleteAddress',['recept_id'=>$add['recept_id']]);?>">删除</a>
						<!-- <a href="javascript:;" class="del_address">删除</a> -->
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>

		<!--弹框-->
		<div class="alert-bg" id="alert-bg7">
			<div class="alert-content">
				<p>温馨提示</p>
				<p>是否删除</p>
				<div><a href="javascript:;" class="cancel">取消</a></div>
				<div><a href="javascript:;" class="affirm">确认</a></div>
			</div>
		</div>
			
		<!--占位元素-->
		<div class="placeholder2"></div>
		<a href="<?php echo U('User/addAddress',['from'=>'my']);?>" class="new-address">新增地址</a>

		<!--js-->
		<script src="/laosan/Public/Home/js/administered.js"></script>
	</body>

</html>