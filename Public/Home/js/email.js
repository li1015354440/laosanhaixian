$(function () {
	var url="http://"+location.host+"/laosan/";
//	下拉;
	var $list = $("#list");
	var $call = $("#call");
	var $area = $("#area");
	var topic_title="";
	var call="";
	var content="";
	
	$list.on("click","li",function () {
		$list.toggleClass("active");
		if($(this).text()==$list.find("li").eq(1).text()){
			$("#list-label").addClass("active-label");
		}else{
			$list.find("li").eq(0).text($(this).text());
			$("#list-label").removeClass("active-label");
		}
		return false;
	})
	
	$call.on("click","li",function () {
		$call.toggleClass("active");
		if($(this).text()!=""){
			$call.find("li").eq(0).text($(this).text());
		}
		return false;
	})
	
	$area.on("focus",function () {
		$(this).addClass("area_active");
		if($(this).val()=="填写信息") {
			$(this).val("");
		}
	})
	$area.on("blur",function () {
		if($(this).val()==""){
			$(this).removeClass("area_active");
			$(this).val("填写信息");
			$("#area-label").addClass("active-label");
		}else{
			$("#area-label").removeClass("active-label");
		}
	})
	
//	发送
	$("#btn").on("click",function () {
		topic_title=$("#list").find("li").eq(0).text();
		call=$("#call").find("li").eq(0).text();
		if(topic_title==$("#list").find("li").eq(1).text()){
			$("#list-label").addClass("active-label");
		}
		if(call==$("#call").find("li").eq(1).text()){
			call="";
		}
		content=$("#area").val();
		if(content=="填写信息" || content==""){
			$("#area-label").addClass("active-label");
		}else{
			$("#area-label").removeClass("active-label");
		}
		$("#sub").submit();
	})
	$("#email-form").validate({
		submitHandler: function() {
			var tel=$("#tel").val();
			var fname=$("#first-name").val();
			var lname=$("#last-name").val();
			var email=$("#email").val();
			if($(".list-label").hasClass("active-label")){
			
			}else{
				$.ajax({
					url: url+"index.php/Home/Ask/set",
					type: "post",
					dataType: "json",
					data: {"topic_title":topic_title,"content":content,"fname":fname,"lname":lname,"email":email,"call":call,"tel":tel},
					success: function (e) {
						if(e.error==0){
							alert(e.message);
							location.reload();
						}else if (e.error==1){
							alert(e.message);
						}
					}
				})
			}
		}
	})
	
})
