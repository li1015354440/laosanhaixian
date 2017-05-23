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
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/add-address.css"/>
		<script src="/laosan/Public/Home/js/jquery.min.js"></script>
		<script src="/laosan/Public/Home/js/jquery.validate.js"></script>
		<script src="/laosan/Public/Home/js/tools.js"></script>
	</head>

	<body data-from="<?php echo ($from); ?>" data-goods_id="<?php echo ($goods_id); ?>" data-quantity="<?php echo ($quantity); ?>" data-recept_id="<?php echo ($recept['recept_id']); ?>">
		<!--收货地址-->
		<form action="" method="post" id="jsForm">
			<ul class="delivery-address">
				<li>
			        <span>收货人</span>
			        <input type="text" placeholder="收货人" id="delivery-man" name="name"  value="<?php echo ($recept['recept_name']); ?>" required data-msg-required="请输入收货人" maxlength="12" data-msg-maxlength="最多输入12个字符" />
			      </li>
			      <li>
			        <span>手机号</span>
			        <input type="text" placeholder="收货人联系电话" id="delivery-phone" name="tel" value="<?php echo ($recept['tel']); ?>" required data-rule-tm="true" data-msg-required="请输入收货人联系电话" />
			      </li>
				<li id="change-address">
					<span>选择省市</span>
			        <input type="text" disabled="disabled" name="city" id="city" required data-msg-required="请选择地址" placeholder="请选择地址" value="<?php echo ($recept['province']); echo ($recept['city']); echo ($recept['country']); ?>" />
			        <input type="hidden" name="" value="" id="id_content" province_id="<?php echo ($recept['province_id']); ?>" city_id="<?php echo ($recept['city_id']); ?>" country_id="<?php echo ($recept['country_id']); ?>">
				</li>
				<li id="last-li">
        			<textarea id="detail-address"><?php if($recept['detail'] == ''): ?>请填写详细地址，例如街道等<?php else: echo ($recept['detail']); endif; ?></textarea>
        			<label id="area"></label>
        		</li>
			</ul>
			
			<div class="save"><a href="javascript:;" id="save">保存</a></div>
			<input type="submit" class="sub" id="sub" />
		</form>
		
		<!--弹框-->
		<div class="alert-bg" id="alert-bg">
			<div class="alert-address" id="alert-address">
				<p>请选择省/直辖市</p>
				<ul id="provinces">
					<?php if(is_array($province_list)): $i = 0; $__LIST__ = $province_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$province): $mod = ($i % 2 );++$i;?><li class="
						<?php if($province['region_id'] == 2): ?>li-active<?php endif; ?>
						" data-region_id =<?php echo ($province['region_id']); ?>><?php echo ($province['title']); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		
		<!--弹框-->
		<div class="alert-bg" id="alert-bg2">
			<div class="alert-address" id="alert-citys">
				<p>请选择市/区</p>
				<ul id="citys"></ul>
			</div>
		</div>
		
		<!--弹框-->
		<div class="alert-bg" id="alert-bg3">
			<div class="alert-address" id="alert-countrys">
				<p>请选择县/镇</p>
				<ul id="countrys"></ul>
			</div>
		</div>

		<!--placeholder 占位元素-->
		<div class="placeholder"></div>

		<!--js-->
		<script src="/laosan/Public/Home/js/add-address.js"></script>
	</body>

</html>