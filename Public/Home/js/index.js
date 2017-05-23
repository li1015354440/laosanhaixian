$(function () {
	var url="http://"+location.host+"/";
	
	for(var i=0; i<$("#img-box").children().length; i++){
		$("#pagination").append("<span></span>");
	}
	go();
})
