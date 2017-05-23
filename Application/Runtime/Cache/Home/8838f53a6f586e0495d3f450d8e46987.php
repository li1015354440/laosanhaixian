<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>老三海鲜</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <form name='alipayment' action='/laosan/Payment/Alipay/wappay/pay.php' method='post'>
        <input type="hidden" name="WIDout_trade_no" value="<?php echo ($data['WIDout_trade_no']); ?>" />
        <input type="hidden" name="WIDsubject" value="<?php echo ($data['WIDsubject']); ?>" />
        <input type="hidden" name="WIDtotal_amount" value="<?php echo ($data['WIDtotal_amount']); ?>"/>
        <input type="hidden" name="WIDbody" value="<?php echo ($data['WIDbody']); ?>" />
        <button id='sub' type="submit" style="display:none"></button>
    </form>
</body>
<script>
        window.onload=function () {
            document.getElementById('sub').click();
        }
</script>
</html>