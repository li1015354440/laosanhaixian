<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>订单支付 </title>
<script src="/laosan/Public/Home/js/jquery-1.7.1.min.js"></script>
<script src="/laosan/Public/Home/js/weixin_pay.js"></script>

</head>
<body>
<!--头部开始-->

<div class="flowpay">
  <h2>微信支付</h2>
  <dl>
    <dd>
      <input type="button" value="立即支付" class="weixinPayBtn" data-order_id="<?php echo ($order_sn); ?>" />
    </dd>
  </dl>
</div>
<!--尾结束-->

</body>
</html>