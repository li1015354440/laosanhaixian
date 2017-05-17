$(function () {
	var url="http://"+location.host+"/";
	
	for(var i=0; i<$("#img-box").children().length; i++){
		$("#pagination").append("<span></span>");
	}
	go();

	//首页
	$("#img-box").children("img").on("click",function () {
		if($(this).index()==0){
			window.location.href=url+"index.php/Home/Shop/imgDetail.html";
		}else if($(this).index()==1){
			window.location.href="http://abc.baobaowan.com/Home/Shop/detail/goods_id/66.html";
		}else if($(this).index()==2){
			window.location.href="http://abc.baobaowan.com/Home/Shop/detail/goods_id/65.html";
		}else if($(this).index()==3){
			window.location.href="http://abc.baobaowan.com/Home/Shop/detail/goods_id/11.html";
		}
	})
})
