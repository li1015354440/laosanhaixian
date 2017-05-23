$(function () {
	var url="http://"+location.host+"/laosan/";
	// var tel=null;
//	发送验证码
	$("#getcode").on("click",function () {
		what();
	})
//	登录
	$("#login_btn").on("click",function (event) {
		if(/^1[0-9]{10}$/.test($("#tel").val())){
			$.ajax({
				url:url+"index.php/Home/User/checkCode",
				type:"post",
				dataType: "json",
				data: {
					"tel":$("#tel").val(),
					"code":$("#iden_code").val()
				},
				success: function (e) {
					console.log(e);
					if(e.error==0){
						window.location.href=url+"Home/Shop/index";
					}
				}
			});
		}
		 event.preventDefault();
	})
	
	function what () {
		var countdown=60;
		var timer = null;
		var sMobile = $("#tel").val();
	//  手机号第二位验证 /^1[3|4|5|7|8][0-9]{9}$/
	//  手机号第二位不验证/^1[0-9]{10}$/
	    if(!(/^1[0-9]{10}$/.test(sMobile))){
	        alert("请输入正确的手机号！");
	        return false; 
	    }else{
	    	$("#getcode").css("background-color","#c2c2c2");
//	    	获取验证码
	    	$.ajax({
	    		url:url+"index.php/Home/User/getCode",
	    		type: "post",
	    		dataType:"json",
	    		data:{"tel":$("#tel").val()},
	    		success: function (e) {
	    			console.log(e)
	    			if(e.error=="0"){
	    			}else if(e.error=="2"){
	    				alert("请在60s后再次获取");
	    			}
	    		}
	    	})
	    }

		timer = setInterval(function () {
			if (countdown == 0) { 
				clearInterval(timer);
				$("#getcode").removeAttr("disabled");    
				$("#getcode").val("获取验证码"); 
				$("#getcode").css("background-color","#2b2b2b");
				countdown = 60; 
				return false;
			} else { 
				$("#getcode").attr("disabled", true); 
				$("#getcode").val("重新发送(" + countdown + ")"); 
				countdown--;
			}
		},1000)
	}
})