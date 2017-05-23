$(function () {
	var url="http://"+location.host+"/laosan/";
//	备注占位符
	$("#commodity-remark").on("focus",function () {
		$(this).val("");
	})
	$("#commodity-remark").on("blur",function () {
		if($(this).val()==""){
			$(this).val("若有尺寸等问题请备注留言，客服会尽快与您联系");
		}
	})
	
//	地址选择
	$("#yesbody").on("click",function(){
		$("#pay_alert").show();
		$("#payer_list").animate({
			"height": "70%"
		},200)
	})
	$("#pay_alert").on("click",function(){
		$("#payer_list").animate({
			"height": "0%"
		},100,function () {
			$("#pay_alert").hide();
		})
		return false;
	});

//	选择地址
	$("#payer_list").on("click","li",function (){
		$(this).find(".check").addClass("active").parents("li").siblings().find(".check").removeClass("active");
//		更换老地址
		$("#old_name").text($(this).find("#address_name").text());
		$("#old_tel").text($(this).find("#address_tel").text());
		$("#old_address").text($(this).find("#address_detail").text());
		$("#yesbody").attr("data-recept_id",$(this).attr("data-recept_sn"));
		
		$("#payer_list").animate({
			"height": "0%"
		},100,function () {
			$("#pay_alert").hide();
		})
	});
	
//	立即付款
	(function () {
		var id="",quantity="",from="",address_id="";
		$("#buy_now").on("click",function () {
			id=$("#orders-list").find("li").attr("data-goods_id");
			quantity=parseInt($("#orders-list").find("#quantity").text());
			from=$("body").attr("data-from");
			address_id=$("#yesbody").attr("data-recept_id");
			if($("#commodity-remark").val()!="若有尺寸等问题请备注留言，客服会尽快与您联系"){
				comment=$("#commodity-remark").val();
			}else{
				comment="";
			}
			if($("body").attr("data-from")=="buy_now"){
				buy();
			}else{
				buy_cart();
			}
		})
		function buy () {
			$.ajax({
				url:url+"index.php/Home/Buy/orderGeneration",
				type: "post",
				dataType: "json",
				data: {
					"goods_id":id,
					"quantity":quantity,
					"from":from,
					"recept_id":address_id,
					"comment":comment
				},
				success: function(e) {
					if(e.error == 0){
						window.location.href=e.url;
					}else if(e.error == 1){
						window.location.href=e.url;
					}else if(e.error==3){
						$("#alert-bg6").show();
					}else if(e.error==6){
						$("#alert-bg5").show();
					}
				}
			})
		}
		function buy_cart () {
			$.ajax({
				url: url+"index.php/Home/Buy/orderGeneration",
				type: "post",
				dataType: "json",
				data: {
					"from":from,
					"recept_id":address_id,
					"comment":comment
				},
				success: function(e) {
					if(e.error == 0){
						window.location.href=e.url;
					}else if(e.error == 1){
						window.location.href=e.url;
					}else if(e.error==3){
						$("#alert-bg6").show();
					}else if(e.error==6){
						$("#alert-bg5").show();
					}
				}
			})
		}
		$("#alert-bg5").on("click",function () {
			$("#alert-bg5").hide();
		})
		$("#alert-bg6").on("click",function () {
			$("#alert-bg6").hide();
		})
	})()
})
