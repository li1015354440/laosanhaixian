<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>微信支付</title>
		<link rel="stylesheet" type="text/css" href="/laosan/Public/Home/css/myreset.css" />
		<script src="/laosan/Public/Home/js/jquery.min.js"></script>
		<script src="/laosan/Public/Home/js/tools.js"></script>
	</head>

	<body data-order_sn="<?php echo ($order_sn); ?>" data-total_price="<?php echo ($total_price); ?>">
		<input type="button" id="submit" value="登录" onclick="callpay();return false;" />
		
		<!--<div align="center">
	        <br/><br/><br/>
	        <asp:Button ID="submit" runat="server" Text="立即支付" OnClientClick="callpay()" style="width:210px; height:50px; border-radius: 15px;background-color:#00CD00; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" />
	    </div>
	</form>-->
		
		<!--js-->
		<script>
//			var $appid = 'wx5e9738282c2778cd';
//		    var $secret = '5946767ec0c0a9883c487f91a5edae45';
//		    var $redirect = 'http://www.zhonghenganyuan.com/laosan/index.php/Home/User/LoginCallBack';
////			$("#sub").on("click",function () {
//				location.href='https://open.weixin.qq.com/connect/oauth2/authorize?appid='+$appid+'&redirect_uri='+$redirect+'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
////			})
			
		</script>
		
		<script type="text/javascript">

           //调用微信JS api 支付
           function jsApiCall()
           {
//             alert(document.getElementById("jjj").value);
               WeixinJSBridge.invoke(
               'getBrandWCPayRequest',
                <%=wxJsApiParam%> ,//josn串
                function (res)
                {
                    WeixinJSBridge.log(res.err_msg);
                    alert(res.err_code + res.err_desc + res.err_msg);
                 }
                );
//             alert("fffffff");
           }

           function callpay()
           {
               if (typeof WeixinJSBridge == "undefined")
               {
                   if (document.addEventListener)
                   {
                       document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                   }
                   else if (document.attachEvent)
                   {
                       document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                       document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                   }
               }
               else
               {
                   jsApiCall();
               }
           }

 		</script>
		
	</body>
</html>