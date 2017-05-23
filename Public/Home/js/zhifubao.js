$(function () {
	var url = "";
	var timer = setTimeout(request,3000);
	function request() {
		$.ajax({
			url:url,
			type:'post',
			data:{"order_sn":$('body').attr('data-order_sn'),"total_price":$("body").attr("data-total_price")},
			data_type:"text",
			success:function (resposne) {
				if(resposne.status == 'success'){
					clearTimeout(timer);
					window.location.href = resposne.url;
				}else{
					clearTimeout(timer);
					timer = setTimeout(request,2000);
				}
			}
		});
	}
});