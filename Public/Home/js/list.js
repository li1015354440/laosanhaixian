$(function () {
	var url="http://"+location.host+"/laosan/";
	var page=1;
	var type=0;
	var type_id="";
	var series_id="";

	// 判断是否有商品
	if($("#commodity").children().length==0){
		$("#commodity").html(
			"<img src='http://www.zhonghenganyuan.com/laosan/Public/Home/img/qidai.png' style='margin: 0 auto; margin-top:30%; margin-bottom: 8%;' width='25%;'/>"+
			"<p style='color: #999; font-size: .15rem;'>敬请期待</p>"
		)
	}

	if(window.location.href.indexOf("type_id/")!=-1){
		type_id =window.location.href.split("type_id/")[1].substring(0,1);
		var data = {"type_id":type_id,"page":page};
		list(data);
	}else if(window.location.href.indexOf("series_id/")!=-1){
		type=1;
		series_id=window.location.href.split("series_id/")[1].substring(0,1);
		var data = {"series_id":series_id,"page":page};
		list(data);
	}

	//滚动加载；
	var stop=true;
	var totalheight = 0;
	$(window).scroll(function(){
		totalheight = parseFloat($(window).height())+parseFloat($(window).scrollTop()); 
		if($(document).height() <= totalheight){ 
			if(stop==true){ 
				stop=false; 
				page+=1;
				if(type==0){
					var data = {"type_id":type_id,"page":page};
				}else{
					var data = {"series_id":series_id,"page":page};
				}
				list(data);
			} 
		} 
	});
	
	
	function list(data){
		$.ajax({
			url:url+"index.php/Home/Shop/list",
			type:"get",
			dataType:"json",
			data:data,
			success: function (e) {
				var _html = "";
				for(var i=0; i<e.goods_list.length; i++){
					_html+="<li>"+
					"<a href='http://abc.baobaowan.com/Home/Shop/detail/goods_id/"+e.goods_list[i].goods_id+"'>"+
					"<img src='http://abc.baobaowan.com/Public/Thumb/"+e.goods_list[i].thumb+"' />"+
					"</a>"+
					"<p>"+e.goods_list[i].series_title+"</p>"+
					"<p>"+e.goods_list[i].name+"</p>"+
					"<p>"+e.goods_list[i].shop_price+"</p>"+
					"</li>"
				}
				$("#commodity").append(_html);
				stop=true;
			}
		})
	}
})