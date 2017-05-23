<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>wxlogin</title>

	</head>

	<body>
		<input type="button" value="支付" id="sub" />

		<!--js-->
		<script>
			var sub = document.getElementById("sub");
			
			var $appid = 'wx5e9738282c2778cd';
		    var $secret = '5946767ec0c0a9883c487f91a5edae45';
		    var $redirect = 'http://www.zhonghenganyuan.com/laosan/index.php/Home/User/LoginCallBack';
    
			sub.onclick = function() {
				var XHR = null;
				if(window.XMLHttpRequest) {
					// 非IE内核  
					XHR = new XMLHttpRequest();
				} else if(window.ActiveXObject) {
					// IE内核,这里早期IE的版本写法不同,具体可以查询下  
					XHR = new ActiveXObject("Microsoft.XMLHTTP");
				} else {
					XHR = null;
				}

				if(XHR) {
					XHR.open("GET", 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='+$appid+'&redirect_uri='+$redirect+'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect');
//					header("Access-Control-Allow-Origin,*");
					XHR.setRequestHeader("Access-Control-Allow-Origin","*");
					XHR.onreadystatechange = function() {
						// readyState值说明  
						// 0,初始化,XHR对象已经创建,还未执行open  
						// 1,载入,已经调用open方法,但是还没发送请求  
						// 2,载入完成,请求已经发送完成  
						// 3,交互,可以接收到部分数据  

						// status值说明  
						// 200:成功  
						// 404:没有发现文件、查询或URl  
						// 500:服务器产生内部错误  
						if(XHR.readyState == 4 && XHR.status == 200) {
							// 这里可以对返回的内容做处理  
							// 一般会返回JSON或XML数据格式  
							console.log(XHR.responseText);
							// 主动释放,JS本身也会回收的  
							XHR = null;
						}
					};
					XHR.send();
				}
			}
		</script>
	</body>

</html>