$(function(){
	var url="http://"+location.host+"/laosan/";
	$(".header>li").on("click",function (){
		var index = $(this).index()+1;
		show(index);
	})

	if($(".wait").find(".list-box").length<1){
		$(".wait").html(
			"<img src='http://www.zhonghenganyuan.com/laosan/Public/Home/img/wudingdan.png' style='margin: 0 auto; margin-top:30%; margin-bottom: 8%;' width='25%'/>"+
			"<p style='color: #999; font-size: .15rem;'>暂无订单</p>"
		)
	}
	
	var id =window.location.href.split("id/")[1].substring(0,1);
	if(id){
		switch (id){
			case "1": show(id);
			break;
			case "2": show(id);
			break;
			case "3": show(id);
			break;
			case "4": show(id);
			default:
				break;
		}
	}
	
//	订单操作
	function show (id) {
		var id=id-1;
		$(".header>li").eq(id).find("a").addClass("active").parent().siblings().find("a").removeClass("active");
		$(".wait").eq(id).show().siblings(".wait").hide();
	}
	
//	取消订单
	$(".wait-pay").on("click",".cancel-order",function () {
		var index = $(this).parents(".list-box").index()-1;
		$("#alert-bg3").show();
		$("#alert-bg3").not(".affirm").on("click",function () {
			$("#alert-bg3").hide();
		})
		$(".affirm").on("click",function () {
			$("#alert-bg3").hide();
			$.ajax({
				url:url+"index.php/Home/User/deleteOrder",
				type:"post",
				dataType:"json",
				data:{"ordersn":$(".wait-pay").find(".list-box").eq(index).find(".order_num").text()},
				success: function (e) {
					$(".wait-pay").find(".list-box").eq(index).remove();
				}
			})
		})

	})
	
//  确认订单
	$(".wait-delivery").on("click",".affirm-order",function () {
		var index = $(this).parents(".list-box").index()-1;
		console.log($(".list-box").eq(index).find(".order_num").text())
		$.ajax({
			url:url+"index.php/Home/User/confirmOrder",
			type:"post",
			dataType:"json",
			data:{"ordersn":$(".wait-delivery").find(".list-box").eq(index).find(".order_num").text()},
			success: function (e) {
				$(".wait-delivery").find(".list-box").eq(index).remove();
			}
		})
	})
	
//	退换货
	$(".back-order").on("click",function () {
		alert("请联系客服");
	})
})

