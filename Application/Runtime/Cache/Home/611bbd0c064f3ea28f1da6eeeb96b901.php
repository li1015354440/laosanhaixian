<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
			<title>发送电子邮件至客户服部门</title>
			<link rel="stylesheet" type="text/css" href="/Public/Home/css/myreset.css" />
			<link rel="stylesheet" type="text/css" href="/Public/Home/css/email.css"/>
			<script src="/Public/Home/js/jquery.min.js"></script>
			<script src="/Public/Home/js/tools.js"></script>
			<script src="/Public/Home/js/jquery.validate.js"></script>
	</head>

	<body>
		<form action="" method="post" name="" id="email-form">
			<p class="hint">如有疑问或需要帮助，请填写下面的表格</p>

			<ul class="list" id="list">
				<li>-- 挑选一个主题 --</li>
				<li>-- 挑选一个主题 --</li>
				<li>一般反馈</li>
				<li>产品咨询</li>
				<li>商务合作</li>
			</ul>
			<label class="list-label" id="list-label">请选择您要咨询的主题</label>
		
			<textarea name="area" rows="" cols="" class="area" id="area" required>填写信息</textarea>
			<label class="list-label" id="area-label">请填写信息</label>
			
			<ul class="list" id="call">
				<li>称呼（非必须）</li>
				<li>称呼（非必须）</li>
				<li>先生</li>
				<li>女士</li>
				<li>小姐</li>
				<li>博士</li>
				<li>先生 & 先生</li>
				<li>女士 & 女士</li>
			</ul>
		
			<input type="text" name="first-name" placeholder="姓" id="first-name" required data-msg-required="请输入姓" />
		
			<input type="text" name="last-name" placeholder="名" id="last-name" required data-msg-required="请输入名"/>
		
			<input type="text" name="tel" placeholder="联系电话（非必须）" id="tel" />
		
			<input type="text" name="email" placeholder="您的电子邮箱地址" id="email" required data-msg-required="请输入邮箱地址" data-rule-email="true" data-msg-email="请输入正确的email地址"/>
		
			<a href="javascript:;" class="btn" id="btn">发送</a>
			<input type="submit" class="sub" id="sub" />
		</form>
		
		<!--js-->
		<script src="/Public/Home/js/email.js"></script>
	</body>

</html>