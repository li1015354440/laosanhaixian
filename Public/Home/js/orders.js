$(function () {
	var url="http://"+location.host+"/laosan/";

	if($(".orders-list").children().length==0){
		$("body").html(
			"<img src='http://www.zhonghenganyuan.com/laosan/Public/Home/img/wudingdan.png' style='margin: 0 auto; margin-top:30%; margin-bottom: 8%;' width='25%'/>"+
			"<p style='color: #999; font-size: .15rem;'>暂无订单</p>"
		)
	}

//	订单操作	
//	取消订单
	$(".cancer-order").on("click",function () {
		var _this = $(this).parents(".order-container");
		$("#alert-bg4").show();
		$("#alert-bg4").not(".affirm").on("click",function () {
			$("#alert-bg4").hide();
		})
		$(".affirm").on("click",function () {
			$("#alert-bg4").hide();
			$.ajax({
				url:url+"index.php/Home/User/deleteOrder",
				type:"post",
				dataType:"json",
				data:{"ordersn":_this.attr("order_sn")},
				success: function (e) {
					_this.remove();
				}
			})
		})
	})
	
//  确认订单
	$(".affirm-order").on("click",function () {
		var _this = $(this).parents(".order-container");
		$.ajax({
			url:url+"index.php/Home/User/confirmOrder",
			type:"post",
			dataType:"json",
			data:{"ordersn":_this.attr("order_sn")},
			success: function (e) {
				_this.remove();
			}
		})
	})
	
//	退换货
	$(".back-order").on("click",function () {
		alert("请联系客服");
	})
})
