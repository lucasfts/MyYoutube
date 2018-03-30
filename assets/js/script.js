function toggleLeft(){
	var obj = $("#container_left");
	$(obj).fadeToggle('300',redefinir());
	
}

function redefinir(){
	var visivel = $("#container_left").css("display");
	if(visivel == "none"){
		$("#container_right").css("left","270px");
	}
	else{
		$("#container_right").css("left","0px");
	}
}

function MostrarScroll(obj){
	$(obj).css("overflow-x","auto");
}

function EsconderScroll(obj){
	$(obj).css("overflow-x","hidden");
}

function Inscrever(obj){
	var canalid = $(obj).data("canalid");
	var userid = $(obj).data("userid");

	$.ajax({
		url : "/ajax/Inscrever",
		type : "post",
		dataType: "json",
		data: {userid: userid, canalid: canalid},
		success:function(json){
			$(obj).css("backgroundColor",json.background);
			$(obj).text(json.texto);
			$('#totalInscritos').text(json.qtInscritos);
		}
	});
}
